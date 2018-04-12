<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;

class EventController extends Controller{

    protected $model;

    protected $service;

    public function __construct()
    {
        // Do nothing
    }

    /**
     * Method to show Event index Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function suggest()
    {
        $suggest = true;

        return view('user::event.suggest', compact('suggest'));
    }

    /**
     * Method to show Events list Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function events()
    {
        $event = true;

        return view('user::event.events', compact('event'));
    }
}