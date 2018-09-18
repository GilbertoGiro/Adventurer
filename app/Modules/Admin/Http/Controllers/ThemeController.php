<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Http\Requests\ThemeRequest;
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
     * Method to show Themes List
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $suggest = true;
        $themes  = $this->service->get('*', $request, 'object');

        return view('admin::theme.index', compact('suggest', 'themes'));
    }

    /**
     * Method to show Theme Create Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $suggest = true;
        $admin = Auth::guard('admin')->user();
        return view('admin::theme.create', compact('suggest', 'admin'));
    }

    /**
     * Method to Create an Theme
     *
     * @param ThemeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ThemeRequest $request)
    {
        $condition = $this->service->createWithoutApprove($request->all());
        if($condition['status'] === '00'){
            return redirect()->back()->with('success', 'Tema atualizado com sucesso');
        }
        return redirect()->back()->withErrors(['message' => $condition['message'], 'type' => 'danger'])->withInput($request->all());
    }

    /**
     * Method to Approve Theme
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $condition = $this->service->update($request->all(), $id);
        if($condition['status'] === '00'){
            return redirect()->back()->with('success', 'Tema atualizado com sucesso');
        }
        return redirect()->back()->withErrors(['message' => $condition['message'], 'type' => 'danger'])->withInput($request->all());
    }

    /**
     * Method to get Theme Information
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $suggest = true;
        $theme   = $this->service->find($id);

        return view('admin::theme.show', compact('suggest', 'theme'));
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