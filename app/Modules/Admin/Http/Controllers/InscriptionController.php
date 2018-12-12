<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Services\InscriptionService;
use Illuminate\Http\Request;

class InscriptionController
{
    /**
     * @var InscriptionService
     */
    protected $service;

    /**
     * InscriptionController constructor.
     *
     * @param InscriptionService $service
     */
    public function __construct(InscriptionService $service)
    {
        $this->service = $service;
    }

    /**
     * Method to update Inscription
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $condition = $this->service->update($request->all(), $id);
        if ($condition['status'] === '00') {
            return redirect()->back()->with('success', 'Solicitação aprovada com sucesso');
        }
        return redirect()->back()->withErrors(['error' => 'Não foi possível aprovar essa solicitação']);
    }
}