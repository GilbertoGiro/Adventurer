<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PaperService;
use App\Services\UserService;

class UserController extends Controller{
    /**
     * @var UserService
     */
    protected $service;

    /**
     * @var PaperService
     */
    protected $paperService;

    /**
     * UserController constructor.
     *
     * @param UserService $service
     * @param PaperService $paperService
     */
    public function __construct(UserService $service, PaperService $paperService)
    {
        $this->service      = $service;
        $this->paperService = $paperService;
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

    /**
     * Method to edit User Information
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user   = true;
        $client = $this->service->find($id);
        $papers = $this->paperService->all();

        return view('admin::user.edit', compact('user', 'client', 'papers'));
    }
}