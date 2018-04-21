<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller{

    protected $service;

    protected $model;

    public function __construct()
    {

    }

    /**
     * Method to show Users List
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin::user.index');
    }
}