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
     * Method to show initial page
     *
     * @return int
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Method to show Theme Suggest page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function suggest()
    {
        return view('theme');
    }

    /**
     * Method to show Events Calendar
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function event()
    {
        return view('event');
    }

    /**
     * Method to show About Us Information
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutUs()
    {
        return view('about-us');
    }
}