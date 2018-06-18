<?php

namespace App\Http\Controllers;

use App\Services\EventService;

class EventController extends Controller{
    /**
     * @var EventService
     */
    protected $service;

    /**
     * EventController constructor.
     *
     * @param EventService $service
     */
    public function __construct(EventService $service)
    {
        $this->service = $service;
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
        $events = $this->service->getCalendarEvents();

        return view('event', compact('events'));
    }
}