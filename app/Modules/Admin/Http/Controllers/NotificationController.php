<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Http\Requests\NotificationRequest;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * @var NotificationService
     */
    protected $service;

    /**
     * NotificationController constructor.
     *
     * @param NotificationService $service
     */
    public function __construct(NotificationService $service)
    {
        $this->service = $service;
    }

    /**
     * Method to list Notifications
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $notification = true;
        $communications = $this->service->get('*', $request, 'object');
        return view('admin::notification.index', compact('notification', 'communications'));
    }

    /**
     * Method to show Create Notification Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $notification = true;
        return view('admin::notification.create', compact('notification'));
    }

    /**
     * Method to Create Notification
     *
     * @param NotificationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NotificationRequest $request)
    {
        $condition = $this->service->create($request->all());
        if ($condition['status'] === '00') {
            return redirect()->back()->with('success', 'Notificação Cadastrada com sucesso');
        }
        return redirect()->back()->withErrors(['message' => $condition['message'], 'type' => 'danger'])->withInput($request->all());
    }

    /**
     * Method to show Edit Notification Form
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $notification = true;
        $notify = $this->service->find($id);
        return view('admin::notification.edit', compact('notification', 'notify'));
    }

    /**
     * Method to update Notification
     *
     * @param NotificationRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NotificationRequest $request, int $id)
    {
        $condition = $this->service->update($request->all(), $id);
        if ($condition['status'] === '00') {
            return redirect()->back()->with('success', 'Notificação atualizada com sucesso');
        }
        return redirect()->back()->withErrors(['message' => $condition['message'], 'type' => 'danger'])->withInput($request->all());
    }

    /**
     * Method to show Notification Information
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $notification = true;
        $notify = $this->service->find($id);
        return view('admin::notification.show', compact('notification', 'notify'));
    }

    /**
     * Method to notify Event Participants
     *
     * @param int $notification
     * @param int $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function notify(int $notification, int $event)
    {
        $condition = $this->service->notify($notification, $event);
        if ($condition['status'] === '00') {
            return response()->json('Participantes notificados com sucesso.', 200);
        }
        return response()->json($condition['message'], 500);
    }
}