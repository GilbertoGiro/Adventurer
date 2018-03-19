<?php

namespace App\Http\Controllers;

class LoginController extends Controller{

    /**
     * Method to show Login Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('login.index');
    }
}