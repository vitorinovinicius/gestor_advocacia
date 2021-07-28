<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
    use HasFactory;
    protected $table = 'pessoas_fisicas';
    protected $fillable = [
        'cpf',
        'pis',
        'sexo',
        'numCtps',
        'serieCtps',
        'tratamento',
        'estadoCivil',
        'nacionalidade',
        'profissao',
        'codMatricula',
        'dtNascimento',
        'tituloEleitor',
        'idtCivil',
        'orgExpeditor',
        'dtExpedicao',
        'nomeMae'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }


}
