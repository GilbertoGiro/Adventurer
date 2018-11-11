<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use App\Services\InscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller{
    /**
     * @var EventService
     */
    protected $service;

    /**
     * @var InscriptionService
     */
    protected $inscription;

    /**
     * EventController constructor.
     *
     * @param EventService $service
     * @param InscriptionService $inscription
     */
    public function __construct(EventService $service, InscriptionService $inscription)
    {
        $this->inscription = $inscription;
        $this->service = $service;
    }

    /**
     * Method to show Events list Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $event  = true;
        $events = $this->service->getCalendarEvents();
        return view('user::event.index', compact('event', 'events'));
    }

    /**
     * Method to show Event Information
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $event = true;
        $episode = $this->service->find($id);
        if ($episode && $episode->stevento === 'abe') {
            $inscription = $this->inscription->findBy([
                'idusuario' => Auth::guard('user')->user()->id,
                'idevento' => $id
            ]);
            return view('user::event.show', compact('event', 'episode', 'inscription'));
        }
        return redirect()->route('user.event')->withErrors(['message' => 'O evento selecionado está indisponível']);
    }

    /**
     * Method to request participation
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apply(int $id, Request $request)
    {
        $condition = $this->service->applyParticipant($request->all(), $id);
        if ($condition['status'] === '00') {
            return redirect()->back()->with('success', 'Solicitação efetuada com sucesso');
        }
        return redirect()->back()->withErrors(['message' => $condition['message']]);
    }
}