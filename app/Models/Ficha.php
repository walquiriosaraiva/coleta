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

    protected $fillable = [
        'nome',
        'cep',
        'rua',
        'bairro',
        'cidade',
        'uf',
        'ibge',
        'telefone',
        'telefone_whatsapp',
        'facebook',
        'instagram',
        'id_user_cadastro',
        'data_cadastro',
        'id_area_atuacao',
        'outra_atuacao'
    ];

    public function areaAtuacao()
    {
        return $this->hasMany(AreaAtuacao::class, 'id', 'id_area_atuacao');
    }

}
