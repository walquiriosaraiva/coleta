<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;

    protected $table = 'ficha';

    protected $primaryKey = 'id';

    protected $dates = ['data_cadastro'];

    public $timestamps = false;

    protected $fillable = ['nome', 'endereco', 'telefone', 'rede_social', 'seq_cidade', 'id_user_cadastro', 'data_cadastro'];
}
