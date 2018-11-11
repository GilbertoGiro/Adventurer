<?php

namespace App\Services;

use App\Mail\CancelEventMail;
use App\Models\Event;
use App\Models\Inscription;
use App\Models\Theme;
use App\Models\User;
use App\Notifications\NewEvent;
use App\Notifications\NewParticipant;
use App\Notifications\UpdatedEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EventService extends AbstractService
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Theme
     */
    protected $theme;

    /**
     * @var Inscription
     */
    protected $inscription;

    /**
     * EventService constructor.
     *
     * @param Event $model
     * @param User $user
     * @param Theme $theme
     * @param Inscription $inscription
     */
    public function __construct(Event $model, User $user, Theme $theme,
                                Inscription $inscription)
    {
        $this->user = $user;
        $this->theme = $theme;
        $this->inscription = $inscription;
        parent::__construct($model);
    }

    /**
     * Method to get Calendar Formatted Events
     *
     * @return mixed
     */
    public function getCalendarEvents()
    {
        $events = $this->model::with('theme')->where('stevento', 'abe')->get();
        foreach ($events as $key => $event) {
            $events[$key] = [
                'title' => $event->theme->titulo,
                'start' => $event->dtprevista . 'T' . $event->hrinicio
            ];
        }
        return $events;
    }

    /**
     * Method to get Event by date and hour
     *
     * @param array $data
     * @return array
     */
    public function getEventByDate(array $data)
    {
        try {
            // Formatting date
            $date = (new Carbon($data['date']))->format('Y-m-d');
            $hour = (new Carbon($data['hour']))->format('H:i');

            // Searching relations on database
            $theme = $this->theme::where('titulo', $data['title'])->first();
            $event = $this->model::where('dtprevista', $date)->where('hrinicio', $hour)
                ->where('idtema', $theme->id)->first();
            if ($event) {
                return ['status' => '00', 'event' => $event];
            }
            return ['status' => '01', 'message' => 'Não foi possível encontrar o evento'];
        } catch (\Exception $e) {
            return ['status' => '01', 'message' => 'Não foi possível encontrar o evento'];
        }
    }

    /**
     * Method to create Event
     *
     * @param array $data
     * @return array|mixed
     */
    public function create(array $data)
    {
        try {
            $admin = Auth::guard('admin')->user();
            $data['flexterno'] = (!empty($data['endereco'])) ? 's' : 'n';
            $data['flaberto'] = (!empty($data['flaberto'])) ? 's' : 'n';

            $new = $this->model->create($data);
            if ($new->id) {
                $theme = $new->theme;
                $users = $this->user->all()->where('idcurso', $theme->idcurso);
                $post = [
                    'titulo' => $theme->titulo,
                    'nmusuario' => $admin->nome
                ];
                foreach ($users as $user) {
                    $user->notify(new NewEvent($post));
                }
                return ['status' => '00'];
            }
            return ['status' => '01', 'message' => 'Ocorreu um erro durante a criação do registro'];
        } catch (\Exception $e) {
            return ['status' => '01', 'message' => 'Ocorreu um erro durante a criação do registro'];
        }
    }

    /**
     * Method to update Event
     *
     * @param array $data
     * @param int $id
     * @return array|mixed
     */
    public function update(array $data, int $id)
    {
        try {
            $admin = Auth::guard('admin')->user();
            $event = $this->model->find($id);
            if ($event->update($data)) {
                if ($this->checkFields($id, $data)) {
                    $theme = $event->theme;
                    $users = $this->user->all()->where('idcurso', $theme->idcurso);
                    $post = [
                        'titulo' => $theme->titulo,
                        'nmusuario' => $admin->nome
                    ];
                    foreach ($users as $user) {
                        $user->notify(new UpdatedEvent($post));
                    }
                }
                return ['status' => '00'];
            }
            return ['status' => '01', 'message' => 'Ocorreu um erro durante a atualização do registro'];
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return ['status' => '01', 'message' => 'Ocorreu um erro durante a atualização do registro'];
        }
    }

    /**
     * Method to apply Participant
     *
     * @param $data
     * @param int $id
     * @return array
     */
    public function applyParticipant(array $data, int $id)
    {
        DB::beginTransaction();
        try {
            // Prepare params
            $user = Auth::guard('user')->user();
            $data['idusuario'] = ($user) ? $user->id : null;
            $data['idevento'] = $id;

            // Apply Participant
            if ($this->inscription->create($data)) {
                $event = $this->model->find($id);
                $admins = $this->user::where('idpapel', 1)->get();
                foreach ($admins as $admin) {
                    $admin->notify(new NewParticipant([
                        'nmusuario' => ($user) ? $user->nome : $data['nmusuario'],
                        'titulo' => $event->theme->titulo
                    ]));
                }
                DB::commit();
                return ['status' => '00'];
            }
            DB::rollback();
            return ['status' => '01', 'message' => 'Não foi possível realizar a solicitação'];
        } catch (\Exception $e) {
            DB::rollback();
            Log::debug($e->getMessage());
            return ['status' => '01', 'message' => 'Não foi possível realizar a solicitação'];
        }
    }

    /**
     * Method to cancel Event
     *
     * @param int $id
     * @return array
     */
    public function cancel(int $id)
    {
        DB::beginTransaction();
        try {
            $event = $this->model->find($id);
            if ($event && $event->update(['stevento' => 'can'])) {
                foreach ($event->inscriptions as $inscription) {
                    $user = $inscription->user;
                    Mail::to($user->email)->queue(new CancelEventMail($event));
                }
            }
            DB::commit();
            return ['status' => '00'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['status' => '01', 'message' => 'Não foi possível cancelar o evento'];
        }
    }

    /**
     * Method to Check Fields (Important Fields)
     *
     * @param int $id
     * @param array $data
     * @return bool
     * @throws \Exception
     */
    private function checkFields(int $id, array $data)
    {
        try {
            $event = $this->model->find($id);
            foreach ($data as $key => $value) {
                if (in_array($key, ['hrinicio', 'dtprevista', 'endereco', 'numero', 'bairro', 'complemento'])) {
                    if ($value !== $event->{$key}) {
                        return true;
                    }
                }
            }
            return false;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}