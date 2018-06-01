<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ThemeService;
use Illuminate\Http\Request;

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