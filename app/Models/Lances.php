<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lances extends Model
{
    use HasFactory, softDeletes;

    protected $table = "lances";

    protected $fillable = [
        'grupo',
        'cota',
        'credito',
        'porcentagem_lance',
        'valor_lance_total',
        'porcentagem_lance_embutido',
        'valor_lance_embutido',
        'porcentagem_lance_proprio',
        'valor_lance_proprio',
        'created_by',
        'status',
        'administradora',
        'cliente',
        'quitacao_grupo',
        'carta_avaliacao',
        'embutido',
        'porcentagem_lance_fixo',
        'valor_lance_fixo',
        'is_automatic',
    ];

    public function createBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function administradora(){
        return $this->belongsTo(Administradoras::class, 'administradora');
    }

    /**
     * Get the grupo associated with the Lances
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grupo(): HasOne
    {
        return $this->hasOne(Grupos::class, 'id', "grupo");
    }
}
