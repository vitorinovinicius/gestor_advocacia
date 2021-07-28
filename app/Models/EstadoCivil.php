<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    use HasFactory;


    protected $table = 'estados_civis';
    protected $fillable = [
        'tipo_Est_Civ'
    ];

    public function pessoaFisica()
    {
        return $this->hasOne(PessoaFisica::class);
    }
}
