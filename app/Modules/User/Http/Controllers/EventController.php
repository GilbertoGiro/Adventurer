<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
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
     * Method to show Events list Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function events()
    {
        $event  = true;
        $events = $this->service->getCalendarEvents();

        return view('user::event.events', compact('event', 'events'));
    }
}