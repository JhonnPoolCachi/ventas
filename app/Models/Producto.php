<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
    	'produ_cod',
        'produ_nombre',
        'cat_cod',
        'baja',
        'usua_reg',
        'fecha_reg',
        'usua_mod',
        'fecha_mod',
        'usua_baja',
        'fecha_baja',       
    ];
    protected $primaryKey = 'produ_cod';
    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria','cat_cod','cat_cod');
    }

}
