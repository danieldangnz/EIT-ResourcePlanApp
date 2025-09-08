<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', Rule::unique('coordinators', 'email')],
            'password' => ['required', 'min:3', 'max:200'],
            'school' => ['required', 'min:2', 'max:255']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);

        auth()->login($user);
        return redirect()->back()->with('authentication-outcome', 'Welcome');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['email' => $incomingFields['loginemail'],
                             'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
        }

        // if user is admin
        if (is_null(auth()->user())) {
            return redirect()->back()->with('authentication-outcome', 'Wrong email or password');
        } else {
            if (auth()->user()->role == '1') {
                return redirect('/dashboard');
            } else {
                return redirect()->back()->with('authentication-outcome', 'Logged in');
            }
        }
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); 
    } 

    public function loginForm() {
        return view('/login');
    }

    public function registrationForm() {
        return view('/register');
    }

    public function dashboard() {
        if (auth()->check() && auth()->user()->role == '1') {
            return view('dashboard');
        } else {
            return redirect('/login');
        }
    }

    public function staff() {
        return view('/staff');
    }

    public function activities() {
        return view('/activities');
    }
}
