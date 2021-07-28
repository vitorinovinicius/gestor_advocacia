<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamento extends Model
{
    use HasFactory;
    protected $table = 'tratamentos';
    protected $fillable = ['tipo_Trat'];

    public function pessoaFisica()
    {
        return $this->hasOne(PessoaFisica::class);
    }
}
