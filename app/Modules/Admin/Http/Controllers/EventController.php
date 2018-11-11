<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Http\Requests\EventRequest;
use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
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
        $event = true;
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
     * @param EventRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EventRequest $request)
    {
        $condition = $this->service->create($request->all());
        if ($condition['status'] === '00') {
            return redirect()->back()->with('success', 'Evento cadastrado com sucesso');
        }
        return redirect()->back()->withErrors(['message' => $condition['message'], 'type' => 'danger'])->withInput($request->all());
    }

    /**
     * Method to show Event Information
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $event = true;
        $episode = $this->service->find($id);
        return view('admin::event.edit', compact('event', 'episode'));
    }

    /**
     * Method to update Event
     *
     * @param EventRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EventRequest $request, int $id)
    {
        $condition = $this->service->update($request->all(), $id);
        if ($condition['status'] === '00') {
            return redirect()->back()->with('success', 'Evento atualizado com sucesso');
        }
        return redirect()->back()->withErrors(['message' => $condition['message'], 'type' => 'danger'])->withInput($request->all());
    }

    /**
     * Method to show Event
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $event = true;
        $episode = $this->service->find($id);
        return view('admin::event.show', compact('event', 'episode'));
    }

    /**
     * Method to show Participation Requests
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function request(int $id)
    {
        $event = $this->service->find($id);
        return view('admin::event.request', compact('event'));
    }

    /**
     * Method to cancel Event
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(int $id)
    {
        $condition = $this->service->cancel($id);
        if ($condition['status'] === '00') {
            return redirect()->back()->with('success', 'Evento cancelado com sucesso');
        }
        return redirect()->back()->withErrors(['message' => $condition['message'], 'type' => 'danger']);
    }
}