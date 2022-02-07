<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'tb_cidade';

    protected $primaryKey = 'seq_cidade';

    public $timestamps = false;

    protected $fillable = ['nom_cidade', 'seq_estado', 'cod_ibge'];

    public function estado()
    {
        return $this->hasMany(Estado::class, 'seq_estado', 'seq_estado');
    }
}
