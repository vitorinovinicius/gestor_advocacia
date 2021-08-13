<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteProcesso extends Model
{
    use HasFactory;

    protected $table = 'cliente_processo';

    protected $fillable = [
        'processo_id',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function processo()
    {
        return $this->belongsTo(Processo::class);
    }
}
