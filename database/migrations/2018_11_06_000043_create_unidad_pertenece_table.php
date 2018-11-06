<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadPerteneceTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'unidad_pertenece';

    /**
     * Run the migrations.
     * @table unidad_pertenece
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('unidad_pertenece');
            $table->integer('direccion_id');

            $table->index(["direccion_id"], 'fk_direcciones_unidad_pertenece_idx');

            $table->unique(["unidad_pertenece"], 'unidad_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('direccion_id', 'fk_direcciones_unidad_pertenece_idx')
                ->references('id')->on('direcciones')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
