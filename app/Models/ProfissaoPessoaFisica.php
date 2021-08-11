<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfissaoPessoaFisica extends Model
{
    use HasFactory;

    protected $table = 'profissao_pessoa_fisica';

    protected $fillable = [
        'pessoa_fisica_id',
        'profissao_id',
        'updated_at',
        'created_at'
    ];

    public $timestamps = false;

    public function pessoaFisica()
    {
        return $this->belongsTo(PessoaFisica::class);
    }

    public function profissao()
    {
        return $this->belongsTo(Profissao::class);
    }
}
