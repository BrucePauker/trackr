<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Return the index page of my account
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.account.index');
    }
}
