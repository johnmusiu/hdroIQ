<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 202);
    }
}
