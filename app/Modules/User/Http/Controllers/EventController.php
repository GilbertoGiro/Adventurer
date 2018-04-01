<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;

class EventController extends Controller{

    protected $service;

    protected $model;

    public function __construct()
    {
        // Do nothing
    }

    public function index()
    {
        return view('user::event.index');
    }
}