<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LancesFixos extends Model
{
    use HasFactory;

    protected $table = 'lances_fixos';

    protected $fillable = [
        'grupo_id',
        'lance_percentual',
        'lance_valor'
    ];

    /**
     * Get the Grupos that owns the LancesFixos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grupos(): BelongsTo
    {
        return $this->belongsTo(Grupos::class, 'grupo_id');
    }
}
