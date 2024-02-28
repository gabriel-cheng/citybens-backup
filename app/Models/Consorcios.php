<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consorcios extends Model
{
    use HasFactory, softDeletes;

    protected $table = "consorcios";

    protected $fillable = [
        'cliente',
        'credito',
        'consultor',
        'taxa_administracao',
        'fundo_reserva',
        'valor_parcela',
        'quantidade_parcelas',
        'administradora',
        'active',
        'consultor',
        'grupo',
        'cota',
        'status',
        'created_by',
    ];

    public function consultor() {
        return $this->belongsTo(User::class, 'consultor');
    }

    public function grupo() {
        return $this->belongsTo(Grupos::class, 'grupo');
    }

    public function createBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function administradora(){
        return $this->belongsTo(Administradoras::class, 'administradora');
    }
}
