<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model{
    /**
     * @var string
     */
    protected $table = 'notificacao';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'titulo', 'corpo', 'idusuario', 'stnotificacao'
    ];

    /**
     * Method to add Active Scope
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('stnotificacao', 'ati');
    }

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