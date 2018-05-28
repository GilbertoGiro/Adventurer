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

    public function index(Request $request)
    {
        $suggest = true;
        $themes  = $this->service->get('*', $request, 'object');

        return view('admin::theme.index', compact('suggest', 'themes'));
    }
}