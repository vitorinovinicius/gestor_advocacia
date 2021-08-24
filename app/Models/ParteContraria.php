<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParteContraria extends Model
{
    use HasFactory;
    protected $table = 'partes_contrarias';
    protected $fillable = [
        'nome',
        'nome_empresa'
    ];

    protected $date = ['date'];

    protected $guarded = [];

    public function pessoaFisica()
    {
        return $this->hasOne(PessoaFisica::class);
    }

    public function pessoaJuridica()
    {
        return $this->hasOne(PessoaJuridica::class);
    }

    public function processo()
    {
        return $this->belongsToMany(Processo::class);
    }

    public function servico()
    {
        return $this->belongsToMany(Processo::class);
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function contato()
    {
        return $this->hasMany(Contato::class);
    }
}
