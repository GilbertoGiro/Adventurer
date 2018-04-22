<?php

namespace App\Http\Controllers;

class EventController extends Controller{
    public function __construct()
    {
        // Do nothing
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
}