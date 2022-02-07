<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'tb_estado';

    protected $primaryKey = 'seq_estado';

    public $timestamps = false;

    protected $fillable = ['seq_estado', 'des_estado', 'sig_estado', 'seq_pais', 'cod_ibge', 'cod_ddd'];

}
