<?php

namespace App\Services;

use App\Mail\PasswordRequestMail;
use App\Models\Recovery;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserService extends AbstractService
{
    /**
     * @var Recovery
     */
    protected $recovery;

    /**
     * UserService constructor.
     *
     * @param User $user
     * @param Recovery $recovery
     */
    public function __construct(User $user, Recovery $recovery)
    {
        $this->recovery = $recovery;

        parent::__construct($user);
    }

    /**
     * Method to create User
     *
     * @param array $data
     * @return array|mixed
     */
    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            $data['senha'] = bcrypt(md5(uniqid(rand())));

            if ($new = $this->model->create($data)) {
                $post = [
                    'idusuario' => $new->id,
                    'token' => bcrypt(md5(uniqid(rand())))
                ];
                $this->recovery->create($post);

                $data['token'] = $post['token'];

                Mail::to($data['email'])->queue(new PasswordRequestMail($data));

                DB::commit();
                return ['status' => '00'];
            }

            DB::rollBack();
            return ['status' => '01', 'message' => 'Não foi possível criar o registro.'];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());
            return ['status' => '01', 'message' => 'Não foi possível criar o registro.'];
        }
    }

    /**
     * Method to update User
     *
     * @param array $data
     * @param int $id
     * @return array|mixed
     */
    public function update(array $data, int $id)
    {
        try {
            $user = $this->model->find($id);
            if ($user->update($data)) {
                return ['status' => '00'];
            }
            return ['status' => '01', 'message' => 'Não foi possível criar o registro.'];
        } catch (\Exception $e) {
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}