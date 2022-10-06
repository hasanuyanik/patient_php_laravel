<?php

namespace App\Http\Controllers;

use App\Console\Contracts\IMedicalService;
use App\Http\Requests\MedicalRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MedicalController extends Controller
{
     /**
     * @var IMedicalService
     */
    private IMedicalService $medicalService;

    public function __construct(IMedicalService $medicalService)
    {
        $this->medicalService = $medicalService;
    }

    /**
     * @param MedicalRequest $request
     * 
     * @return JsonResponse
     */
    public function create(MedicalRequest $request): JsonResponse
    {
        try{
            return response()->json($this->medicalService->create($request->validated()));
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
        }
    }

    /**
     * @param int $id
     * @param MedicalRequest $request
     * 
     * @return JsonResponse
     */
    public function update(int $id, MedicalRequest $request): JsonResponse
    {
        try{
            return response()->json(['status' => $this->medicalService->update($id, $request->validated())]);
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
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
            return response()->json(['status' => $this->medicalService->delete($id)]);
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
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
            return response()->json($this->medicalService->byPatientId($id));
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
        }
    }
}
