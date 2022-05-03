<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Inertia\Response;
use Inertia\ResponseFactory;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response|ResponseFactory
     */
    public function index(): Response|ResponseFactory
    {
        return inertia('Login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return RedirectResponse|Response|ResponseFactory
     */
    public function login(Request $request): Response|ResponseFactory|RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (! auth()->attempt($request->only(['email', 'password']))) {
            return inertia('Login', [
                'errors' => [
                    'email' => ['Invalid credentials'],
                ],
            ]);
        }

        return redirect("/")->with('success', 'You are logged in!');
    }

    public function logout(): Redirector|Application|RedirectResponse
    {
        auth()->logout();
        return redirect('/')->with('success', 'You are logged out!');
    }

    public function register(): Response|ResponseFactory
    {
        return inertia('Register');
    }

    public function store(Request $request): Redirector|Application|RedirectResponse
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'You are logged in!');
    }
}
//    {
//        $request->validate([
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//
//        $credentials = $request->only(['email', 'password']);
//    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param Request $request
//     * @return Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param Request $request
//     * @param  int  $id
//     * @return Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
//}
