<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class TokenController extends Controller
{
    /**
     * Returns all tokens
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function index()
    {
        // if user type is not admin, redirect to home page
        if (Auth::user()->type != 'admin') { //TODO: figure out how to do this
            return redirect('/');
        }
        $tokens = Token::where('user_id', Auth::id())->get();
        return Inertia::render('Tokens/Index', [
            'tokens' => $tokens
        ]);
    }

    /**
     * Show the form that allows Administrators to create a new token.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function create()
    {
        // If user type is not admin, redirect to home page
        if (Auth::user()->account_type != 'admin') { //TODO: figure out how to do this
            return redirect('/');
        }
        return Inertia::render('TokensCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'value' => 'required|numeric|min:1'
        ]);
        // Create the token
        $token = new Token([
            'user_id' => $request->user_id,
            'value' => $request->value
        ]);
        // Save the token
        $token->save();
        // Redirect to the tokens page
        return redirect('/tokens');
    }

    /**
     * Display information about the selected token
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {
        $token = Token::find($id);
        return Inertia::render('Tokens/Show', [
            'token' => $token
        ]);
    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }

//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $token = Token::find($id);
        $token->delete();
        return redirect('/tokens');
    }
}
