<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\{Foundation\Application};
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Routing\{Redirector};
use Illuminate\Support\Facades\{Auth, Session};
use Inertia\{Inertia, Response};

class AuthController extends Controller
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return Inertia::render('Home');
        }

        return redirect("/login")->withErrors(['error' => 'Incorrect credentials']);
    }

    /**
     * Register the user.
     *
     * @return Redirector|Application|RedirectResponse
     */
    public function logout(): Redirector|Application|RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return Redirect('/')->with('success', 'You are logged out!');
    }
}
