<?php

namespace App\Http\Controllers;

use App\Console\Contracts\IKinService;
use App\Console\Contracts\IMedicalService;
use App\Console\Contracts\IPatientService;
use App\Console\Contracts\IPersonService;
use App\Http\Requests\PatientRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    /**
     * @var IKinService
     */
    private IKinService $kinService;

    /**
     * @var IMedicalService
     */
    private IMedicalService $medicalService;

    /**
     * @var IPatientService
     */
    private IPatientService $patientService;

    /**
     * @var IPersonService
     */
    private IPersonService $personService;

    public function __construct(
        IKinService $kinService,
        IMedicalService $medicalService,
        IPatientService $patientService,
        IPersonService $personService
        )
    {
        $this->kinService = $kinService;
        $this->medicalService = $medicalService;
        $this->patientService = $patientService;
        $this->personService = $personService;
    }

    /**
     * @param PatientRequest $request
     * 
     * @return JsonResponse
     */
    public function create(PatientRequest $patientRequest): JsonResponse
    {
        try{
            return response()->json($this->patientService->create($patientRequest->validated()));
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'May not be a id_card. An error occured!'], 400);
        }
    }

    /**
     * @param int $id
     * @param PatientRequest $request
     * 
     * @return JsonResponse
     */
    public function update(int $id, PatientRequest $request): JsonResponse
    {
        try{
            return response()->json(['status' => $this->patientService->update($id, $request->validated())]);
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'May not be a id_card. An error occured!'], 400);
        }
    }

    /**
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        try{
            return response()->json(['status' => $this->patientService->delete($id)]);
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'May not be a id_card. An error occured!'], 400);
        }
    }

    /**
     * @param int $id
     * 
     * @return JsonResponse
     */
    public function byPatientId(int $id): JsonResponse
    {
        try{
            return response()->json($this->patientService->byPatientId($id));
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
        }
    }

    /**
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        try{
            return response()->json($this->patientService->list());
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
        }
    }

    public function import(Request $request)
    {
        $patientJson = json_decode(file_get_contents($request->patient->path()));

        DB::beginTransaction();

        foreach ($patientJson as $patient) {
            
            // Create Person
            try{
                $this->createPerson($patient);
            } catch(Exception $exception) 
            {
                Log::error($exception);
                DB::rollBack();
                        
                return response()->json(['error' => 'An error occured while create person!'], 400);
            }

            $newPatient = $this->patientService->create(['id_card' => $patient->IdCard]);

            if ($patient->NextOfKin[0]) {
                /**
                 * Create Kin Relation and Kin Person
                 */
                try{
                    $this->createKin($patient);
                } catch(Exception $exception) {
                    Log::error($exception);
                    DB::rollBack();
                        
                    return response()->json(['error' => 'An error occured while create kin relation and kin person!'], 400);
                }
            }

            /**
             * Medical - Start
             */

                // Conditions
                if (isset($patient->Medical->Conditions) && $patient->Medical->Conditions[0]) {
                    try{    
                        $this->createMedicalForType($patient->Medical->Conditions, $newPatient['id'], 'Conditions');
                    } catch(Exception $exception) {
                        Log::error($exception);
                        DB::rollBack();
                        
                        return response()->json(['error' => 'An error occured while create medical->condition!'], 400);
                    }
                }

                
                
                //Alergies
                if (isset($patient->Medical->Alergies) && $patient->Medical->Alergies[0]) {
                    try{    
                        $this->createMedicalForType($patient->Medical->Alergies, $newPatient['id'], 'Alergies');   
                    } catch(Exception $exception) {
                        Log::error($exception);
                        DB::rollBack();
                        
                        return response()->json(['error' => 'An error occured while create medical->alergies!'], 400);
                    }
                }
                
                // Medication
                if (isset($patient->Medical->Medication) && $patient->Medical->Medication[0]) {
                    try{
                        $this->createMedicalForType($patient->Medical->Medication, $newPatient['id'], 'Medication'); 
                    } catch(Exception $exception) {
                        Log::error($exception);
                        DB::rollBack();
                        
                        return response()->json(['error' => 'An error occured while create medical->medication!'], 400);
                    }
                }

            /**
             * Medical - End
             */
                
        }

        DB::commit();
    }

    /**
     * Create Person
     * 
     * @param object $patient
     */
    private function createPerson(object $patient)
    {
        $this->personService->create([
            'id_card' => $patient->IdCard,
            'gender' => $patient->Gender,
            'name' => $patient->Name,
            'surname' => $patient->Surname,
            'date_of_birth' => $patient->DateOfBirth,
            'address' => $patient->Address,
            'post_code' => $patient->Postcode,
            'contact_number_1' => $patient->ContactNumber1,
            'contact_number_2' => $patient->ContactNumber2
        ]);     
    }

    /**
     * Create Kin Relation And Kin Person
     * 
     * @param object $patient
     */
    private function createKin(object $patient)
    {

        foreach ($patient->NextOfKin as $kinPerson) {

                $this->personService->create([
                    'id_card' => $kinPerson->IdCard,
                    'name' => $kinPerson->Name,
                    'surname' => $kinPerson->Surname,
                    'contact_number_1' => $kinPerson->ContactNumber1,
                    'contact_number_2' => $kinPerson->ContactNumber2
                ]);

                $this->kinService->create([
                    'id_card' => $patient->IdCard,
                    'kin_id_card' => $kinPerson->IdCard
                ]);
        }

    }

    /**
     * Create Medical for Type
     * 
     * @param array $patient
     * @param int $patientId
     * @param string $type
     * 
     */
    private function createMedicalForType(array $medicals, int $patientId, string $type)
    {
        foreach($medicals as $medical) {
            $this->medicalService->create([
                'patient_id' => $patientId,
                'name' => $medical->Name ?? null,
                'notes' => $medical->Notes ?? null,
                'start_date' => $medical->StartDate ?? null,
                'end_date' => $medical->EndDate ?? null,
                'type' => $type
            ]);
        }
    }
}
