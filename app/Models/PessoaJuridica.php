<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{
    use HasFactory;
    protected $table = 'pessoas_juridicas';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
