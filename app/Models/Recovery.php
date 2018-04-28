<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recovery extends Model{
    /**
     * @var string
     */
    protected $table = 'recuperacao';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'idusuario', 'token', 'flutilizado'
    ];

    /**
     * Method to get related User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'idusuario', 'id');
    }
}