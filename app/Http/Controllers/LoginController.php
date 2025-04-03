<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::validate($credentials)) {
            return redirect()->to('/login')->withErrors('Las credenciales no son válidas.')->withInput($request->only('email'));
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }
    public function authenticated(Request $request, $user)
    {
        return redirect('/dashboard')->with('success', 'Has iniciado sesión con éxito.');
    }
}
