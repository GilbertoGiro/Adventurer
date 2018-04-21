<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    protected $service;

    protected $model;

    public function __construct()
    {

    }

    /**
     * Method to get Admin Login Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin::login.index');
    }
}