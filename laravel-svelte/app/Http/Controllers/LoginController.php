<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\{Foundation\Application};
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Routing\{Redirector};
use Illuminate\Support\Facades\{Auth, Session};
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
     * @param $request
     * @return Redirector|Application|RedirectResponse
     */
    public function logout(): Redirector|Application|RedirectResponse
    {
        Auth::logout();

        // Invalidate the session if the user is logged out.
        Session::invalidate();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
