<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    /**
     * @var EventService
     */
    protected $event;

    /**
     * ModalController constructor.
     *
     * @param EventService $event
     */
    public function __construct(EventService $event)
    {
        $this->event = $event;
    }

    /**
     * Method to get Recovery Modal
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function recovery()
    {
        return response()->json(['html' => view('user::modal.recovery')->render()]);
    }

    /**
     * Method to get Apply Participant Modal
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function applyParticipant(Request $request)
    {
        $event = $this->event->find($request->get('id'));
        return response()->json(['html' => view('user::modal.participate', compact('event'))->render()]);
    }
}