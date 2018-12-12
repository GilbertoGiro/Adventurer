<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\Http\Requests\RecoveryRequest;
use App\Services\RecoveryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @var RecoveryService
     */
    protected $recoveryService;

    /**
     * LoginController constructor.
     *
     * @param RecoveryService $recoveryService
     */
    public function __construct(RecoveryService $recoveryService)
    {
        $this->recoveryService = $recoveryService;
    }

    /**
     * Method to show Login Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user::login.index');
    }

    /**
     * Method to login user
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function auth(Request $request)
    {
        $data = $request->only(['email', 'password', 'idpapel']);
        if (Auth::guard('user')->attempt($data)) {
            return redirect()->route('user.dashboard');
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
        if ($condition['status'] === '00') {
            return redirect()->back()->with('success', 'Solicitação realizada com sucesso');
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
        if ($condition['status'] === '00') {
            return redirect()->route('web.login')->with('success', 'A senha foi alterada com sucesso');
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
        Auth::guard('user')->logout();
        return redirect()->to('usuario/login');
    }
}