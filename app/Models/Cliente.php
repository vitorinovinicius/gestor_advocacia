<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nome_empresa'
    ];

    protected $date = ['date'];

    protected $guarded = [];

    public function contato()
    {
        return $this->hasMany(Contato::class);
    }

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

    public function clienteProcesso()
    {
        return $this->hasMany(ClienteProcesso::class);
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }




}
