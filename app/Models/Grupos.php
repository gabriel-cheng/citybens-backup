<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administradoras;
use App\Models\LancesFixos;

class Grupos extends Model
{
    use HasFactory;

    protected $table = 'grupos';

    protected $fillable = [
        'administradora_id',
        'grupo',
        'bem',
        'credito',
    ];


    /**
     * Get the administradora that owns the Grupo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function administradora()
    {
        return $this->belongsTo(Administradoras::class, 'administradora_id');
    }

    /**
     * Get all of the Lances Fixos for the Grupos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lancesFixos()
    {
        return $this->hasMany(LancesFixos::class, 'grupo_id');
    }

}
