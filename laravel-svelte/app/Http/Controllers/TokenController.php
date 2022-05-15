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
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Token');
    }

    /**
     * Show the form that allows Administrators to create a new token.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|numeric|min:1'
        ]);

        $user_id = Auth::user()->id;

        Token::create([
            'user_id' => $user_id,
            'value' => $request->value
        ]);

        return redirect('/')->with('success', 'Token created successfully');
    }

    /**
     * Display information about the selected token
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {

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
