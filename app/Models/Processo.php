<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $table = 'processos';
    protected $fillable = [
        'pasta',
        'numInicial',
        'parteContraria',
        'numProcesso',
        'ultAndamento',
        'compromisso',
        'instInicial',
        'dtDistribuicao',
        'advContrario',
        'titulo'
    ];
    use HasFactory;

    public function cliente()
    {
        return $this->belongsToMany(Cliente::class, 'processo_cliente');
    }
}
