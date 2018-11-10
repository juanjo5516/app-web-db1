<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    public $table = 'lab_farmaceuticos_insumos';
	public $primaryKey = 'id_laboratorio';
	protected $fillable = ['nombre'];
}
