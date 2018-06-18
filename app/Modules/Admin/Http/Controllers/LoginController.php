<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Admin\Http\Requests\RecoveryRequest;
use App\Services\RecoveryService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @var UserService
     */
    protected $service;

    /**
     * @var RecoveryService
     */
    protected $recoveryService;

    /**
     * @var User
     */
    protected $model;

    /**
     * LoginController constructor.
     *
     * @param UserService $service
     * @param User $model
     */
    public function __construct(UserService $service, RecoveryService $recoveryService, User $model)
    {
        $this->model = $model;
        $this->service = $service;
        $this->recoveryService = $recoveryService;
    }

    /**
     * Method to get Admin Login Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin::login.index');
    }

    /**
     * Method to login Admin
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function auth(Request $request)
    {
        $data = $request->only(['email', 'password', 'idpapel']);

        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(['message' => 'As credenciais não estão corretas.', 'type' => 'danger'])->withInput($request->except('password'));
    }

    /**
     * Method to Request User Password Recovery
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function request(Request $request)
    {
        $condition = $this->recoveryService->request($request->all());

        if($condition['status'] === '00'){
            return redirect()->back()->withErrors(['message' => 'Solicitação realizada com sucesso', 'type' => 'success']);
        }

        return redirect()->back()->withErrors(['message' => $condition['message'], 'type' => 'danger']);
    }

    /**
     * Method to show Recovery Password Form
     *
     * @param Request $request
     * @param $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function recovery(Request $request, $token)
    {
        $condition = $this->recoveryService->checkToken($token);

        return view('user::password.recovery', compact('condition'));
    }

    /**
     * Method to change User Password
     *
     * @param RecoveryRequest $request
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function change(RecoveryRequest $request, $token)
    {
        $condition = $this->recoveryService->changePassword($request->all(), $token);

        if($condition['status'] === '00'){
            return redirect()->back()->withErrors(['message' => 'A senha foi alterada com sucesso', 'type' => 'success']);
        }

        return redirect()->back()->withErrors(['message' => $condition['message'], 'type' => 'danger']);
    }

    /**
     * Method to logoff user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->to('administrador/login');
    }
}