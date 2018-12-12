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
        'nome', 'email', 'senha', 'idcurso', 'idpapel', 'flemail', 'calendia', 'calensem', 'calenmes', 'flexterno', 'stusuario'
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
     * Method to get Auth Password
     *
     * @return mixed|string
     */
    public function getAuthPassword()
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

    /**
     * Method to get related Themes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function theme()
    {
        return $this->hasMany(Theme::class, 'idusuario', 'id');
    }

    /**
     * Method to get related Events
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Inscription::class, 'idusuario', 'id')->where('stinscricao', 'apr');
    }

    /**
     * Method to check if Model User is Admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        if ($this->attributes['idpapel'] === 1) {
            return true;
        }
        return false;
    }

    /**
     * Overrides the method to ignore the remember token.
     *
     * @param string $key
     * @param mixed $value
     * @return $this|void
     */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute) {
            parent::setAttribute($key, $value);
        }
    }
}
