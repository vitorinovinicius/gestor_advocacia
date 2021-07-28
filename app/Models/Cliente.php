<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];
    use HasFactory;
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
        return $this->belongsToMany(Processo::class, 'processo_cliente');
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    /*public function estadoCivil()
    {
        return $this->hasOneThrough(
            EstadoCivil::class,
            PessoaFisica::class,
            'cliente_id',
            'id'

        );
    }

    public function tratamento()
    {
        return $this->hasOneThrough(
            Tratamento::class,
            PessoaFisica::class,
            'cliente_id',
            'id'

        );
    }

    public function profissao()
    {
        return $this->hasOneThrough(
            Profissao::class,
            PessoaFisica::class,
            'cliente_id',
            'id'

        );
    }

    public function orgExpeditor()
    {
        return $this->hasOneThrough(
            OrgaoExpeditor::class,
            PessoaFisica::class,
            'cliente_id',
            'id'

        );
    }*/




}
