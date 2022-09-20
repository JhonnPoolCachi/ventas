<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';

    protected $fillable = [
    	'cat_cod',
        'cat_nombre',
        'baja',
        'usua_reg',
        'fecha_reg',
        'usua_mod',
        'fecha_mod',
        'usua_baja',
        'fecha_baja',       
    ];
    protected $primaryKey = 'cat_cod';
    public $timestamps = false;

}
