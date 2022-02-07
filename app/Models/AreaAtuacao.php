<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaAtuacao extends Model
{
    use HasFactory;

    protected $table = 'area_atuacao';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ['name'];
}
