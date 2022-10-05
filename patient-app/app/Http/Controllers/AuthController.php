<?php

namespace App\Http\Controllers;

use App\Console\Contracts\IUserService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * @var IUserService
     */
    private IUserService $userService;
    
    /**
     * @param IUserService $userService
     */
    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }


    public function register(RegisterRequest $request)
    {
        try{
            return response()->json($this->userService->create($request->validated()));
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
        }
    }

    public function login(LoginRequest $request)
    {
        try{
            if(! auth()->attempt($request->validated())) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            
            return response()->json([
                'token' => $request->user()->createToken($request->email)->plainTextToken
            ]);
        } catch(Exception $exception)
        {
            Log::error($exception);

            return response()->json(['error' => 'An error occured!'], 400);
        }
    }
}
