<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'experiencias';

    /**
     * Run the migrations.
     * @table experiencias
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso');
            $table->string('observacion')->nullable();
            $table->integer('empleado_id')->nullable();
            $table->integer('entidad_id');
            $table->integer('puesto_id');

            $table->index(["empleado_id"], 'fk_empleados_experiencias_idx');

            $table->index(["entidad_id"], 'fk_experiencias_entidad_idx');

            $table->index(["puesto_id"], 'fk_experiencias_puestos_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('empleado_id', 'fk_empleados_experiencias_idx')
                ->references('id')->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('entidad_id', 'fk_experiencias_entidad_idx')
                ->references('id')->on('entidades')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('puesto_id', 'fk_experiencias_puestos_idx')
                ->references('id')->on('puestos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
