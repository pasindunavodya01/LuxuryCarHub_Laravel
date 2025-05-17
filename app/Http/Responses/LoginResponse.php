<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        if (Auth::user()->role === 'dealer') {
            return redirect()->intended(route('dealer.cars.index'));
        }
        
        return redirect()->intended(route('dashboard'));
    }
}
