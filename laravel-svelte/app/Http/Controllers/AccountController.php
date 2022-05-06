<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Inertia\{Inertia, Response, ResponseFactory};

class AccountController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return Response|ResponseFactory
     */
    public function index(): Response|ResponseFactory
    {
        return inertia('Register');
    }

    /**
     * Register a user.
     *
     * @param Request $request
     * @return Redirector|Application|RedirectResponse
     */
    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create($attributes);
        Auth::login($user);

        return redirect('/')->with('success', 'You are logged in!');
    }

    /**
     * Show the user profile information.
     *
     * @param User $user
     * @return Response|ResponseFactory
     */
    public function show(User $user): Response|ResponseFactory
    {
        return Inertia::render('Profile', [
            'User' => [
                'name' => $user->name,
                'email' => $user->email,
            ]
        ]);
    }

    /**
     * Edit the user profile information.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users,email']
        ]);

        $user->update($attributes);
        $user->save();

        return redirect('/account')->with('success', 'Your profile has been updated!');
    }
}
