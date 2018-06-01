<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model{
    /**
     * Database Table
     *
     * @var string
     */
    protected $table = 'tema';

    /**
     * Database Table Columns
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'descricao', 'nmusuario', 'email', 'idcurso', 'sttema', 'idusuario', 'idresponsavel', 'photo'
    ];

    /**
     * Method to get related course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'idcurso');
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

    /**
     * Method to get related Admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'idresponsavel', 'id');
    }

    /**
     * Method to get Photo Attribute
     *
     * @return string
     */
    public function getPhotoAttribute()
    {
        return env('APP_URL') . 'administrador/temas/imagem/' . $this->attributes['id'];
    }

    /**
     * Method to get Photo Raw Attribute
     *
     * @return string
     */
    public function getPhotoRawAttribute()
    {
        return $this->attributes['photo'];
    }
}