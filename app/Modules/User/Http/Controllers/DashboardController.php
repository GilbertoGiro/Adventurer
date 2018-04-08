<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller{

    protected $service;

    protected $model;

    public function __construct()
    {
        // Do nothing
    }

    /**
     * Method to show index Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $dashboard = true;

        return view('user::dashboard.index', compact('dashboard'));
    }
}