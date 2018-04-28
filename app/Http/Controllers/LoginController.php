<?php

namespace App\Http\Controllers;

use App\Modules\User\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    /**
     * @var UserService
     */
    protected $service;

    /**
     * LoginController constructor.
     *
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Method to show Login Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Method to Create User
     *
     * @param UserRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $condition = $this->service->create($request->all());

        if($condition['status'] === '00'){
            return redirect()->back()->withErrors(['message' => 'Conta criada com sucesso. Verifique o E-mail para confirmar sua conta', 'type' => 'success']);
        }

        return redirect()->back()->withErrors(['message' => 'Não foi possível criar a conta.', 'type' => 'danger'])->withInput($request->all());
    }
}