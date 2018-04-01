<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;

class LoginController extends Controller{
    /**
     * Method to show Login Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user::login.index');
    }
}