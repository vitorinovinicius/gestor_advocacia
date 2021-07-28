<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgaoExpeditor extends Model
{
    use HasFactory;

    protected $table = 'orgaos_expeditores';
    protected $fillable = ['tipo_Org_Exp'];

    public function pessoaFisica()
    {
        return $this->hasOne(PessoaFisica::class);
    }
}
