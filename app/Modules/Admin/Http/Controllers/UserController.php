<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller{
    /**
     * @var UserService
     */
    protected $service;

    /**
     * UserController constructor.
     *
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Method to show Users List
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user  = true;
        $users = $this->service->all();

        return view('admin::user.index', compact('user', 'users'));
    }

    /**
     * Method to show User Information
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user   = true;
        $client = $this->service->find($id);

        return view('admin::user.show', compact('user', 'client'));
    }
}