<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ParcelasConsorcios;

class ConsorciosSimulador extends Model
{
    use HasFactory;

    protected $table = "consorcios_simulator";

    protected $fillable =   [
        'administradora_id',
        'credito',
        'taxa_administracao',
        'bem',
    ];

    /**
     * Get all of the parcelas for the ConsorciosSimulador
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parcelas(): HasMany
    {
        return $this->hasMany(ParcelasConsorcios::class, 'consorcio_simulator_id');
    }

    /**
     * Get the administradora that owns the ConsorciosSimulador
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function administradora(): BelongsTo
    {
        return $this->belongsTo(Administradoras::class, 'administradora_id');
    }
}
