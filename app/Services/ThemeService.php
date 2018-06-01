<?php

namespace App\Services;

use App\Models\Theme;
use App\Models\User;
use App\Notifications\NewTheme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ThemeService extends AbstractService{
    /**
     * @var User
     */
    protected $user;

    /**
     * ThemeService constructor.
     *
     * @param Theme $model
     * @param User $user
     */
    public function __construct(Theme $model, User $user)
    {
        $this->user = $user;

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
            $data['idusuario'] = Auth::guard('user')->user()->id;

            if(!empty($data['photo'])){
                $file = $data['photo'];

                unset($data['photo']);
            }

            $new = $this->model->create($data);

            if($new){
                if(!empty($file)){
                    Storage::disk('local')->put('theme/' . $new->id . '/tema.png', file_get_contents($file));

                    $new->update(['photo' => 'theme/' . $new->id . '/tema.png']);
                }

                $admins = $this->user->all()->where('idpapel', 1);

                foreach($admins as $admin){
                    $admin->notify(new NewTheme($data));
                }

                DB::commit();
                return ['status' => '00'];
            }

            DB::rollback();
            return ['status' => '01', 'message' => 'Não foi possível realizar a ação solicitada'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}