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
}