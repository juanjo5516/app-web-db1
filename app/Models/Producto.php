<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
	use SoftDeletes;

    protected $fillable = ['producto', 'precio_compra','precio_venta','descripcion','categoria_id'];

    protected $dates = ['deleted_at'];
}
