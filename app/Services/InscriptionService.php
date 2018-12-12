<?php

namespace App\Services;

use App\Models\Inscription;

class InscriptionService extends AbstractService
{
    /**
     * @var Inscription
     */
    protected $model;

    /**
     * InscriptionService constructor.
     *
     * @param Inscription $model
     */
    public function __construct(Inscription $model)
    {
        parent::__construct($model);
    }

    /**
     * Method to update Inscription
     *
     * @param array $data
     * @param int $id
     * @return array|mixed
     */
    public function update(array $data, int $id)
    {
        try {
            $inscription = $this->model->find($id);
            if ($inscription->update($data)) {
                return ['status' => '00'];
            }
            return ['status' => '01'];
        } catch (\Exception $e) {
            return ['status' => '01'];
        }
    }
}