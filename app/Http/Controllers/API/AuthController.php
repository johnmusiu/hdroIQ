<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->getMessageBag(), 400);
        }

        if(!auth()->attempt($request->all())){
            return response()->json(['error'=>'Invalid credentials']);
        }
        $user = auth()->user();
        $token = $user->createToken('authToken')->accessToken;
        $user['token'] = $token;

        return response()->json($user);
    }
}
