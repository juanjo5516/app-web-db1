<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
	public $table = 'insumo';
	protected $fillable = ['ID_INSUMO', 'ID_LOTE', 'NOMBRE', 'ID_LABORATORIO', 'EXISTENCIA'];
}
