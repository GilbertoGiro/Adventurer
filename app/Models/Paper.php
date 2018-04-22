<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model{
    /**
     * @var string
     */
    protected $table = 'papel';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'nome'
    ];
}