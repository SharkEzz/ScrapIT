<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|max:255'
        ]);

        if(Auth::attempt($data))
        {
            /**
             * @var $user User
             */
            $user = Auth::user();
            $token = $user->createToken($user->id.'-access-token');

            return new JsonResponse([
                'user' => $user,
                'token' => $token->plainTextToken
            ]);
        }
        else
        {
            return new JsonResponse([], 401);
        }
    }

    public function logout(Request $request)
    {
        if(Auth::check())
        {
            $request->user()->tokens()->delete();
            Auth::logout();
            return new JsonResponse([
                'success' => 'Logged out'
            ]);
        }
        else
        {
            return new JsonResponse([], 400);
        }
    }
}
