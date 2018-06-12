<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ModalController extends Controller{
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
     * Method to get Event Information Modal
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function eventInformation(Request $request)
    {
        // Formatting date
        $date = (new Carbon($request->get('date')))->format('Y-m-d');
        $hour = (new Carbon($request->get('hour')))->format('H:i');
        
        // Searching relations on database
        $theme = Theme::all()->where('titulo', $request->get('title'))->first();
        $event = Event::all()->where('dtprevista', $date)->where('hrinicio', $hour)->where('idtema', $theme->id)->first();

        // Checking if relation exists
        if(empty($event)){
            return response()->json(['message' => 'Nenhum evento encontrado com as informações passadas.'], 204);
        }

        // If exists, return Modal Template
        return response()->json(['html' => view('admin::modal.event-information', compact('event'))->render()]);
    }
}