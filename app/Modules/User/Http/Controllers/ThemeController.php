<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ThemeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller{
    /**
     * @var ThemeService
     */
    protected $service;

    /**
     * ThemeController constructor.
     *
     * @param ThemeService $service
     */
    public function __construct(ThemeService $service)
    {
        $this->service = $service;
    }

    /**
     * Method to show Theme Suggest Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function suggest()
    {
        $suggest = true;
        $user    = Auth::guard('user')->user();

        return view('user::event.suggest', compact('suggest', 'user'));
    }

    /**
     * Method to create an Theme
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $condition = $this->service->create($request->all());

        if($condition['status'] === '00'){
            return redirect()->back()->withErrors(['message' => 'Sugestão adicionada com sucesso.', 'type' => 'success']);
        }

        return redirect()->back()->withErrors(['message' => $condition['message'], 'type' => 'danger'])->withInput($request->all());
    }

    /**
     * Method to get Theme Photo
     *
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function image($id)
    {
        $theme = $this->service->find($id);

        return response(file_get_contents(storage_path('app/' . $theme->photo_raw)))
            ->header('Content-Type', 'image/png');
    }
}