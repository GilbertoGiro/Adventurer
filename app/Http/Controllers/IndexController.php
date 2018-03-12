<?php

namespace App\Http\Controllers;

class IndexController extends Controller{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        // Do nothing
    }

    /**
     * @return int
     */
    public function index()
    {
        return view('index');
    }
}