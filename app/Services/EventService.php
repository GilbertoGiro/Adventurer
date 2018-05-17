<?php

namespace App\Services;

use App\Models\Event;

class EventService{
    /**
     * @var Event
     */
    protected $model;

    /**
     * EventService constructor.
     *
     * @param Event $model
     */
    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    /**
     * Method to get all Events
     *
     * @return Event[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->all();
    }
}