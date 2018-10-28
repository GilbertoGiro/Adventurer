<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Support\Facades\Log;

class NotificationService extends AbstractService
{
    /**
     * NotificationService constructor.
     *
     * @param Notification $model
     */
    public function __construct(Notification $model)
    {
        parent::__construct($model);
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
}