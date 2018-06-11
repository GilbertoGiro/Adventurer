<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

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
     * Method to show Events list
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $event  = true;
        $events = $this->service->get('*', $request, 'object');

        return view('admin::event.index', compact('event', 'events'));
    }

    /**
     * Method to show Create Event Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $event = true;

        return view('admin::event.create', compact('event'));
    }

    /**
     * Method to create Event
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $condition = $this->service->create($request->all());

        if($condition['status'] === '00'){
            return redirect()->back()->withErrors(['message' => 'Evento cadastrado com sucesso', 'type' => 'success']);
        }

        return redirect()->back()->withErrors(['message' => $condition['message'], 'type' => 'danger'])->withInput($request->all());
    }
}