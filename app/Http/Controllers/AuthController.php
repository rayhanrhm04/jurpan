<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Display the registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi pengguna
    public function register(Request $request)
    {
        $this->validateRegistration($request);

        $this->createUser($request);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Display the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login pengguna
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    // Proses logout pengguna
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    // Validasi permintaan registrasi
    private function validateRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    // Buat pengguna baru
    private function createUser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);
    }

    // Validasi permintaan login
    private function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    // Coba login pengguna
    private function attemptLogin(Request $request): bool
    {
        return Auth::attempt($request->only('email', 'password'));
    }
}