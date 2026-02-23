<?php

namespace App\Http\Controllers;

use App\Models\SsoToken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SsoController extends Controller
{
    public function generateTokenAndRedirect(){

        $token=STR::random(40);

        SsoToken::create(([
            'token'=>$token,
            'user_id'=>auth()->id(),
        ]));

        $foodpandaUrl = env('FOODPANDA_URL') . '/sso-verify?token=' . $token;

        return redirect()->away($foodpandaUrl);

    }
}
