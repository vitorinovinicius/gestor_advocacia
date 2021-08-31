<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->belongsToMany(Cliente::class, 'servico_cliente');
    }

    public function parteContraria()
    {
        return $this->belongsToMany(Cliente::class);
    }
}
