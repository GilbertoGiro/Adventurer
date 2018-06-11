<?php

namespace App\Services;

use App\Models\Event;
use App\Models\User;
use App\Notifications\NewEvent;
use Illuminate\Support\Facades\Auth;

class EventService extends AbstractService{
    /**
     * @var User
     */
    protected $user;

    /**
     * EventService constructor.
     *
     * @param Event $model
     * @param User $user
     */
    public function __construct(Event $model, User $user)
    {
        $this->user = $user;

        parent::__construct($model);
    }

    /**
     * Method to get Calendar Formatted Events
     *
     * @return mixed
     */
    public function getCalendarEvents()
    {
        $events = $this->model::with('theme')->get();

        foreach($events as $key => $event){
            $events[$key] = [
                'title' => $event->theme->titulo,
                'start' => $event->dtprevista . 'T' . $event->hrinicio . ':00'
            ];
        }

        return $events;
    }

    /**
     * Method to create Event
     *
     * @param array $data
     * @return array|mixed
     */
    public function create(array $data)
    {
        try{
            $admin             = Auth::guard('admin')->user();
            $data['flexterno'] = (!empty($data['endereco'])) ? 's' : 'n';
            $data['flaberto']  = (!empty($data['flaberto'])) ? 's' : 'n';

            $new = $this->model->create($data);

            if($new->id){
                $users = $this->user->all()->where('idcurso', $new->theme->idcurso);
                $post  = [
                    'titulo'    => $new->theme->titulo,
                    'nmusuario' => $admin->nome
                ];

                foreach($users as $user){
                    $user->notify(new NewEvent($post));
                }

                return ['status' => '00'];
            }

            return ['status' => '01', 'message' => 'Ocorreu um erro durante a criação do registro'];
        }catch(\Exception $e){
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}