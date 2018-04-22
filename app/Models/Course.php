<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model{
    /**
     * @var string
     */
    protected $table = 'curso';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'nome'
    ];
}