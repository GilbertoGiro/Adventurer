<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller{

    protected $service;

    public function __construct()
    {
        // Do nothing
    }

    /**
     * Method to show Admin Dashboard
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('admin::dashboard.index');
    }
}