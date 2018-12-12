<?php

namespace App\Http\Controllers;

use App\Services\EventService;

class IndexController extends Controller
{
    /**
     * @var EventService
     */
    protected $eventService;

    /**
     * IndexController constructor.
     *
     * @param EventService $eventService
     */
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * Method to show initial page
     *
     * @return int
     */
    public function index()
    {
        $events = $this->eventService->limit(4);
        return view('index', compact('events'));
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