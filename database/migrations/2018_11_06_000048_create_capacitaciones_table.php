<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapacitacionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'capacitaciones';

    /**
     * Run the migrations.
     * @table capacitaciones
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('curso');
            $table->string('lugar');
            $table->date('finalizacion');
            $table->integer('empleado_id');
            $table->integer('institucion_id');

            $table->index(["empleado_id"], 'fk_capacitaciones_empleados_idx');

            $table->index(["institucion_id"], 'fk_empleados_instituciones_idx');

            $table->unique(["curso"], 'curso_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('empleado_id', 'fk_capacitaciones_empleados_idx')
                ->references('id')->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('institucion_id', 'fk_empleados_instituciones_idx')
                ->references('id')->on('instituciones')
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
