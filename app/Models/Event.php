<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * @var string
     */
    protected $table = 'evento';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'idtema', 'endereco', 'numero', 'bairro', 'complemento', 'flaberto', 'flexterno',
        'dtprevista', 'hrinicio', 'limite', 'palestrante', 'duracao', 'stevento'
    ];

    /**
     * Method to get related Theme
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function theme()
    {
        return $this->hasOne(Theme::class, 'id', 'idtema');
    }

    /**
     * Method to get related Inscriptions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'idevento', 'id');
    }
}