<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model{
    /**
     * @var string
     */
    protected $table = 'evento';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'nome', 'idcurso', 'endereco', 'numero', 'bairro', 'complemento', 'flaberto', 'flexterno'
    ];

    /**
     * Method to get related Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'idcurso');
    }
}