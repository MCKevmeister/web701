<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Inertia\{Inertia, Response};

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Login');
    }

    /**
     * Login the user.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function login(Request $request): Response|Redirector|Application|RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Register the user.
     *
     * @param \Illuminate\Http\Request $request
     * @return Redirector|Application|RedirectResponse
     */
    public function logout(Request $request): Redirector|RedirectResponse|Application
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
