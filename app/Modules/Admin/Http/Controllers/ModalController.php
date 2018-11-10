<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\NotificationService;
use App\Services\ThemeService;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    /**
     * @var ThemeService
     */
    protected $theme;

    /**
     * @var NotificationService
     */
    protected $notification;

    /**
     * ModalController constructor.
     *
     * @param ThemeService $theme
     * @param NotificationService $notification
     */
    public function __construct(ThemeService $theme, NotificationService $notification)
    {
        $this->theme = $theme;
        $this->notification = $notification;
    }

    /**
     * Method to get Recovery Modal
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function recovery()
    {
        return response()->json(['html' => view('admin::modal.recovery')->render()]);
    }

    /**
     * Method to get Approve Theme Modal
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function approveTheme(Request $request)
    {
        $theme = $this->theme->find($request->get('id'));
        return response()->json(['html' => view('admin::modal.approve-theme', compact('theme'))->render()]);
    }

    /**
     * Method to get Disapprove Theme Modal
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function disapproveTheme(Request $request)
    {
        $theme = $this->theme->find($request->get('id'));
        return response()->json(['html' => view('admin::modal.disapprove-theme', compact('theme'))->render()]);
    }

    /**
     * Method to get Event Participants Notification Modal
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function eventParticipantsNotification(Request $request)
    {
        $notifications = $this->notification->active();
        return response()->json(['html' => view('admin::modal.event-notify', compact('notifications'))->render()]);
    }
}