<?php

namespace App\Http\Controllers;

use App\Console\Contracts\IPersonService;
use App\Http\Requests\PersonRequest;
use Exception;
use Illuminate\Http\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PersonController extends Controller
{
    /**
     * @var IPersonService
     */
    private IPersonService $personService;

    public function __construct(IPersonService $personService)
    {
        $this->personService = $personService;
    }

    /**
     * @param PersonRequest $request
     * 
     * @return JsonResponse
     */
    public function create(PersonRequest $request): JsonResponse
    {
        try{
            return response()->json($this->personService->create($request->validated()));
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
        }
    }

    /**
     * @param int $id
     * @param PersonRequest $request
     * 
     * @return JsonResponse
     */
    public function update(int $id, PersonRequest $request): JsonResponse
    {
        try{
            return response()->json(['status' => $this->personService->update($id, $request->validated())]);
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
            return response()->json(['status' => $this->personService->delete($id)]);
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
        }
    }

    /**
     * @param string $idCard
     * 
     * @return JsonResponse
     */
    public function byIdCard(string $idCard): JsonResponse
    {
        try{
            return response()->json($this->personService->byIdCard($idCard));
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
        }
    }

}
