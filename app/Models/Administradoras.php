<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grupos;

class Administradoras extends Model
{
    use HasFactory;

    protected $table = "administradoras";

    protected $fillable = [
        'administradora',
        'dia_assembleia',
        'tipos_lance'
    ];

    /**
     * Get all of the grupos for the Administradoras
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupos()
    {
        return $this->hasMany(Grupos::class, 'administradora_id');
    }

}
