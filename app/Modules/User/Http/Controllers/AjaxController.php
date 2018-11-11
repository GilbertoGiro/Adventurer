<?php

namespace App\Modules\User\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;

class AjaxController
{
    /**
     * @var EventService
     */
    protected $event;

    /**
     * AjaxController constructor.
     *
     * @param EventService $event
     */
    public function __construct(EventService $event)
    {
        $this->event = $event;
    }

    /**
     * Method to get event by date
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEventByDate(Request $request)
    {
        $condition = $this->event->getEventByDate($request->all());
        if ($condition['status'] === '00') {
            return response()->json($condition['event'], 200);
        }
        return response()->json($condition['message'], 500);
    }
}