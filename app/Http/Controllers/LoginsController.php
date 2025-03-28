<?php
namespace App\Http\Controllers;

use App\Models\Logins;
use Illuminate\Http\Request;

class LoginsController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:logins',
            'password' => 'required|min:6',
        ]);

        Logins::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login.index');
    }
}
