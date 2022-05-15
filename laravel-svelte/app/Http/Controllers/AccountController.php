<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Inertia\{Inertia, Response};

class AccountController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return Application|RedirectResponse|Redirector|Response
     */
    public function index(): Response|Redirector|Application|RedirectResponse
    {
        return Inertia::render('Register');
    }

    /**
     * Register a user.
     *
     * @param Request $request
     * @return Redirector|Application|RedirectResponse
     * @throws Exception
     */
    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $newUser = new CreateNewUser();
        $user = $newUser->create($request->all());

        Auth::login($user);
        $request->session()->flash('success', 'You have successfully registered!');

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Show the user profile information.
     *
     * @return Application|Redirector|RedirectResponse|Response
     */
    public function show(): Response|Redirector|RedirectResponse|Application
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user = Auth::user();

        return inertia::render('AccountDetails', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'accountType' => $user->accountType,
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
            'email' => ['required', 'email', 'unique:users,email']
        ]);

        $user->update($attributes);
        $user->save();

        return redirect('/account')->with('success', 'Your profile has been updated!');
    }
}
