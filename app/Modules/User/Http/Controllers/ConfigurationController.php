<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;

class ConfigurationController extends Controller{
    protected $service;

    protected $model;

    public function __construct()
    {
        // Do nothing
    }

    /**
     * Method to show Configuration Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $configuration = true;

        return view('user::configuration.index', compact('configuration'));
    }
}