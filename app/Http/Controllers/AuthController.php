<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect('/');
        }
        return view('login');
    }

    public function user_register()
    {
        if (auth()->check()) {
            return redirect('/');
        }
        return view('register');
    }

    public function user_store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|lowercase|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
            'is_active' => true,
            'ip_address' => $request->ip(),
            'notification_token' => $request->input('notification_token', null),
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
    }
    public function advertiser_register()
    {
        if (auth()->check()) {
            return redirect('/');
        }

        return view('advertiser-register');
    }

    public function advertiser_store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|lowercase|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|in:individual,agency',
            'accept_condition' => 'required'
        ], [
            "accept_condition" => 'Please accept the terms and conditions'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'advertiser', // user, Individual advertiser, es agency
            'is_active' => true,
            'ip_address' => $request->ip(),
            'notification_token' => $request->input('notification_token', null),
            'type' =>  $validated['type'],
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::guard('web')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
