<?php

namespace App\Services;

use App\Models\Recovery;

class RecoveryService{
    /**
     * @var Recovery
     */
    protected $model;

    /**
     * RecoveryService constructor.
     *
     * @param Recovery $model
     */
    public function __construct(Recovery $model)
    {
        $this->model = $model;
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

            return ['status' => '01', 'message' => 'O token informado não é válido'];
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
        try{
            $recovery = $this->model->all()->where('token', $token)->first();

            $data['senha'] = bcrypt($data['senha']);

            if($recovery->update($data)){
                return ['status' => '00'];
            }

            return ['status' => '01', 'message' => 'Não foi possível realizar a ação solicitada.'];
        }catch(\Exception $e){
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}