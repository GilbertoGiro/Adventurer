<?php

namespace App\Services;

use App\Models\Theme;
use Illuminate\Support\Facades\DB;

class ThemeService extends AbstractService{
    /**
     * ThemeService constructor.
     *
     * @param Theme $model
     */
    public function __construct(Theme $model)
    {
        parent::__construct($model);
    }

    /**
     * Method to create an Theme
     *
     * @param array $data
     * @return array|mixed
     */
    public function create(array $data)
    {
        DB::beginTransaction();
        try{
            echo '<pre>';print_r($data);exit;

            DB::commit();
            return ['status' => '00'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}