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
            $user = $request->only(['email', 'password', 'idpapel']);

            if(Auth::guard('user')->attempt($user)){
                return redirect()->route('user.dashboard');
            }

            return redirect()->back()->withErrors(['message' => 'A conta foi criada com sucesso, mas não foi possível efetuar o Login.'])->withInput($request->all());
        }

        return redirect()->back()->withErrors(['message' => 'Não foi possível criar a conta.'])->withInput($request->all());
    }
}