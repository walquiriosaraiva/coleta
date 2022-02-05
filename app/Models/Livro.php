<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livro';

    protected $primaryKey = 'id';

    protected $dates = ['data_cadastro'];

    public $timestamps = false;

    protected $fillable = ['titulo', 'descricao', 'autor', 'numero_pagina', 'data_cadastro'];
}
