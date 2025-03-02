<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'nip' => 'required|integer',
            'password' => 'required|string|min:6',
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            // dd(Auth::user());
            return redirect()->route('index'); // Use named route for better reliability
        }
        
        return back()->withErrors([
            'nip' => 'NIP or password is incorrect.', // Error message for failed login
        ])->withInput();
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
