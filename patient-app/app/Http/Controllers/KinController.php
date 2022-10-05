<?php

namespace App\Http\Controllers;

use App\Console\Contracts\IKinService;
use App\Http\Requests\KinRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class KinController extends Controller
{
    /**
     * @var IKinService
     */
    private IKinService $kinService;

    public function __construct(IKinService $kinService)
    {
        $this->kinService = $kinService;
    }

    /**
     * @param KinRequest $request
     * 
     * @return JsonResponse
     */
    public function create(KinRequest $request): JsonResponse
    {
        try{
            return response()->json($this->kinService->create($request->validated()));
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
        }
    }

    /**
     * @param KinRequest $request
     * 
     * @return JsonResponse
     */
    public function delete(KinRequest $request): JsonResponse
    {
        try{
            return response()->json(['status' => $this->kinService->delete($request->validated())]);
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
            return response()->json($this->kinService->byIdCard($idCard));
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
    public function byKinIdCard(string $idCard): JsonResponse
    {
        try{
            return response()->json($this->kinService->byKinIdCard($idCard));
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
        }
    }
}
