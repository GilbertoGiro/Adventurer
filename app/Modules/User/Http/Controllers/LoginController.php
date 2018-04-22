<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
     * Method to log-in user
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function auth(Request $request)
    {
        $data = $request->only(['email', 'password', 'idpapel']);

        if(Auth::guard('user')->attempt($data)){
            return redirect()->route('user.dashboard');
        }

        return redirect()->back()->withErrors(['message' => 'As credenciais não estão corretas.', 'type' => 'danger'])->withInput($request->except('password'));
    }
}