<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Method to show index Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $dashboard = true;
        $user = Auth::guard('user')->user();
        return view('user::dashboard.index', compact('dashboard', 'user'));
    }
}