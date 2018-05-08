<?php

namespace App\Services;

use App\Mail\PasswordRecoveryMail;
use App\Models\Recovery;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RecoveryService{
    /**
     * @var Recovery
     */
    protected $model;

    /**
     * @var User
     */
    protected $user;

    /**
     * RecoveryService constructor.
     *
     * @param Recovery $model
     * @param User $user
     */
    public function __construct(Recovery $model, User $user)
    {
        $this->model = $model;
        $this->user  = $user;
    }

    /**
     * Method to send User Change Password Request
     *
     * @param array $data
     * @return array
     */
    public function request(array $data)
    {
        DB::beginTransaction();
        try{
            $user = $this->user->all()->where('email', $data['email'])->first();

            if(empty($user)){
                DB::rollback();
                return ['status' => '01', 'message' => 'Usuário inexistente.'];
            }

            $post = [
                'idusuario' => $user->id,
                'token'     => bcrypt(md5(uniqid(rand()))),
            ];
            $recovery = $this->model->create($post);

            Mail::to($user->email)->queue(new PasswordRecoveryMail(['token' => $recovery->token]));

            DB::commit();
            return ['status' => '00'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }

    /**
     * Method to check if request token is valid
     *
     * @param $token
     * @return array
     */
    public function checkToken($token)
    {
        try{
            $recovery = $this->model->all()->where('token', $token)->where('flutilizado', null)->first();

            if(!empty($recovery)){
                return ['status' => '00'];
            }

            return ['status' => '01', 'message' => 'O <b><u>token</u></b> informado é <b>inválido</b> <i class="fa fa-bug"></i>'];
        }catch(\Exception $e){
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }

    /**
     * Method to change User Password
     *
     * @param array $data
     * @param string $token
     * @return array
     */
    public function changePassword(array $data, $token)
    {
        DB::beginTransaction();
        try{
            $recovery = $this->model->all()->where('token', $token)->where('flutilizado', null)->first();

            if(empty($recovery)){
                return ['status' => '01', 'message' => 'O token informado é inválido.'];
            }

            $user = $recovery->user;
            if($user->update(['senha' => bcrypt($data['senha'])])){
                $recovery->update(['flutilizado' => 's']);

                DB::commit();
                return ['status' => '00'];
            }

            DB::rollback();
            return ['status' => '01', 'message' => 'Não foi possível realizar a ação solicitada.'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}