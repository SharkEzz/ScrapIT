<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
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
            return new JsonResponse(Auth::user());
        }
        else
        {
            return new JsonResponse([
                'error' => 'Unauthorized'
            ], 401);
        }
    }
}
