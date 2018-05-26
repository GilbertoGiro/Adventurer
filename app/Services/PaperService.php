<?php

namespace App\Services;

use App\Models\Paper;

class PaperService extends AbstractService{
    /**
     * PaperService constructor.
     *
     * @param Paper $model
     */
    public function __construct(Paper $model)
    {
        parent::__construct($model);
    }
}