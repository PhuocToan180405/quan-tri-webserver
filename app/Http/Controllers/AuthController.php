<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login.
     * Allow login with username OR email + password.
     */
    public function login(Request $request)
    {
        $request->validate([
            'login'    => 'required|string',
            'password' => 'required|string',
        ], [
            'login.required'    => 'Please enter your username or email.',
            'password.required' => 'Please enter your password.',
        ]);

        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginField => $request->login,
            'password'  => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Welcome back, ' . $user->ho_ten . '!');
            }

            return redirect()->route('client.dashboard')
                ->with('success', 'Welcome back, ' . $user->ho_ten . '!');
        }

        return back()
            ->withInput($request->only('login'))
            ->with('error', 'Invalid username/email or password.');
    }

    /**
     * Show registration form.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration.
     * Default ma_quyen = 2 (Client).
     */
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:user,username',
            'email'    => 'required|string|email|max:255|unique:user,email',
            'password' => 'required|string|min:8|confirmed',
            'ho'       => 'required|string|max:255',
            'ten'      => 'required|string|max:255',
            'sdt'      => 'nullable|string|max:20',
        ], [
            'username.required' => 'Please enter a username.',
            'username.unique'   => 'This username is already taken.',
            'email.required'    => 'Please enter an email address.',
            'email.email'       => 'Invalid email format.',
            'email.unique'      => 'This email is already registered.',
            'password.required' => 'Please enter a password.',
            'password.min'      => 'Password must be at least 8 characters.',
            'password.confirmed'=> 'Password confirmation does not match.',
            'ho.required'       => 'Please enter your last name.',
            'ten.required'      => 'Please enter your first name.',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'ho'       => $request->ho,
            'ten'      => $request->ten,
            'sdt'      => $request->sdt,
            'ma_quyen' => 2,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('client.dashboard')
            ->with('success', 'Registration successful! Welcome, ' . $user->ho_ten . '!');
    }

    /**
     * Logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'You have been logged out successfully.');
    }
}
