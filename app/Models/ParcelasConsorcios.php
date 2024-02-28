<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ConsorciosSimulador;

class ParcelasConsorcios extends Model
{
    use HasFactory;

    protected $table = "consorcios_parcelas";

    protected $fillable =   [
        'consorcio_simulator_id',
        'parcelas',
        'valor_parcela',
    ];

    /**
     * Get the consorcio that owns the ParcelasConsorcios
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consorcio(): BelongsTo
    {
        return $this->belongsTo(ConsorciosSimulador::class, 'id');
    }

}
