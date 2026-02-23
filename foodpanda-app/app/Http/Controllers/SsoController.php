<?php

namespace App\Http\Controllers;

use App\Models\SsoToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SsoController extends Controller
{
    public function verifyTokenAndLogin(Request $request){

        $token = $request->query('token');

        if (!$token) {
            return redirect('/login')->withErrors(['error' => 'No SSO token provided.']);
        }

        $ssoToken = SsoToken::where('token', $token)->first();

        if (!$ssoToken) {
            return redirect('/login')->withErrors(['error' => 'Invalid or expired SSO token.']);
        }

        Auth::loginUsingId($ssoToken->user_id);

        $ssoToken->delete();
        
        return redirect('/dashboard');
    }
}
