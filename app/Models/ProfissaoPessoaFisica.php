<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfissaoPessoaFisica extends Model
{
    use HasFactory;

    protected $table = 'profissao_pessoa_fisica';

    protected $fillable = ['pessoa_fisica_id'];

    public $timestamp = false;
}
