<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;

class ModalController extends Controller{
    /**
     * Method to get Recovery Modal
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function recovery()
    {
        return response()->json(['html' => view('user::modal.recovery')->render()]);
    }
}