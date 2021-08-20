<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $fillable = [
        'logradouro',
        'complemento',
        'numEndereco',
        'bairro',
        'cidade',
        'uf',
        'cep'
        ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function parteContraria()
    {
        return $this->belongsTo(Cliente::class);
    }
}
