<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
	public $table = 'insumo';
	public $primaryKey = 'ID_INSUMO';
	public $timestamps = false;
	protected $fillable = ['ID_LOTE', 'NOMBRE', 'ID_LABORATORIO', 'EXISTENCIA'];
}
