<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    /**
     * Database Table
     *
     * @var string
     */
    protected $table = 'inscricao';

    /**
     * Database Table Columns
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nome', 'email', 'flaluno', 'idusuario', 'idevento', 'stinscricao',
        'motivorecusa'
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

    /**
     * Method to get related Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'idevento', 'id');
    }
}