<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function login(LoginRequest $request)
    {
        try {
        $user = $request->user;
        
        $abilities = ['is-' . $user->tipo]; 
        
        $token = $user->createToken($user->email, $abilities)->plainTextToken;
        return compact('token', 'user');
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao realizar login.',
                'error' => $error->getMessage()
            ], 401);
        }
    }


public function logout(Request $request)
{
    $revokeAll = $request->input('revoke_all', false);
    
    if ($revokeAll) {
        
        $request->user()->tokens()->delete();
        $message = 'Todos os tokens foram revogados';
    } else {
        
        $request->user()->currentAccessToken()->delete();
        $message = 'Token atual revogado';
    }
    
    return response()->json(['message' => $message]);
}
}
