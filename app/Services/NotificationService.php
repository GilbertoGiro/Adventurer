<?php

namespace App\Services;

use App\Mail\NotificationMail;
use App\Models\Event;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotificationService extends AbstractService
{
    /**
     * @var Event
     */
    protected $event;

    /**
     * NotificationService constructor.
     *
     * @param Notification $model
     * @param Event $event
     */
    public function __construct(Notification $model, Event $event)
    {
        $this->event = $event;
        parent::__construct($model);
    }

    /**
     * Method to add Active Scope
     *
     * @return mixed
     */
    public function active()
    {
        return $this->model->active()->get();
    }

    /**
     * Method to create Notification
     *
     * @param array $data
     * @return array|mixed
     */
    public function create(array $data)
    {
        try {
            if ($new = $this->model->create($data)) {
                return ['status' => '00'];
            }
            return ['status' => '01', 'message' => 'Não foi possível cadastrar a Notificação'];
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return ['status' => '01', 'message' => 'Não foi possível cadastrar a Notificação'];
        }
    }

    /**
     * Method to update Notification
     *
     * @param array $data
     * @param int $id
     * @return array|mixed
     */
    public function update(array $data, int $id)
    {
        try {
            $notification = $this->model->find($id);
            if ($notification->update($data)) {
                return ['status' => '00'];
            }
            return ['status' => '01', 'message' => 'Não foi possível atualizar a Notificação'];
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return ['status' => '01', 'message' => 'Não foi possível atualizar a Notificação'];
        }
    }

    /**
     * Method to notify Event participants
     *
     * @param int $id
     * @param int $event
     * @return array
     */
    public function notify(int $id, int $event)
    {
        DB::beginTransaction();
        try {
            $notification = $this->model->find($id);
            $event = $this->event->find($event);
            if ($notification && $event) {
                foreach ($event->inscriptions as $inscription) {
                    Mail::to($inscription->user->email)->queue(new NotificationMail([
                        'event' => $event,
                        'notification' => $notification
                    ]));
                }
            }
            DB::commit();
            return ['status' => '00'];
        } catch (\Exception $e) {
            DB::rollback();
            Log::debug($e->getMessage());
            return ['status' => '01', 'message' => 'Não foi possível notificar os participantes'];
        }
    }
}