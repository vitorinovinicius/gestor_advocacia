<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissao extends Model
{
    use HasFactory;

    protected $table = 'profissoes';
    protected $fillable = ['tipo_Prof'];

    public function pessoaFisica()
    {
        return $this->hasOne(PessoaFisica::class);
    }

}
