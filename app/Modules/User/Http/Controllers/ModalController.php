<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;

class ModalController extends Controller{
    /**
     * Method to get Recovery Modal
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function recovery()
    {
        return view('user::modal.recovery');
    }
}