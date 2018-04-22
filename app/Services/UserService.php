<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService extends AbstractService{
    /**
     * UserService constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
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
        try{
            $data['senha'] = bcrypt($data['password']);

            if($this->model->create($data)){
                DB::commit();
                return ['status' => '00'];
            }

            DB::rollBack();
            return ['status' => '01', 'message' => 'Não foi possível criar o registro.'];
        }catch(\Exception $e){
            DB::rollBack();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}