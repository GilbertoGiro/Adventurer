<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
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
     * @var User
     */
    protected $model;

    /**
     * LoginController constructor.
     *
     * @param UserService $service
     * @param User $model
     */
    public function __construct(UserService $service, User $model)
    {
        $this->service = $service;
        $this->model = $model;
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
     * Method to logout Admin
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->to('administrador/login');
    }
}