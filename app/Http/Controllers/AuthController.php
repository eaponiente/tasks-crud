<?php

namespace App\Http\Controllers;

use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LogoutAction;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws ValidationException
     */
    public function login(LoginRequest $request, LoginAction $action)
    {
        $token = $action->execute($request->validated());

        return response()->json(['token' => $token]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logout(Request $request, LogoutAction $action): \Illuminate\Http\Response
    {
        $action->execute($request->user());

        return response()->noContent();
    }
}
