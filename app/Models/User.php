<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */
    protected $table = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'senha', 'idcurso', 'idpapel', 'flemail', 'calendia', 'calensem', 'calenmes', 'flexterno'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha'
    ];

    /**
     * Method to get Password
     *
     * @return mixed
     */
    public function getPasswordAttribute()
    {
        return $this->attributes['senha'];
    }

    /**
     * Method to get related Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne(Course::class, 'id', 'idcurso');
    }

    /**
     * Method to get related Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paper()
    {
        return $this->hasOne(Paper::class, 'id', 'idpapel');
    }
}
