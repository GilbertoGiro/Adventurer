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
}