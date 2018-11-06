<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosLicenciasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'empleados_licencias';

    /**
     * Run the migrations.
     * @table empleados_licencias
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('numero_licencia', 45);
            $table->integer('empleados_id');
            $table->integer('licencias_id');

            $table->index(["empleados_id"], 'fk_empleados_has_licencias_empleados1_idx');

            $table->index(["licencias_id"], 'fk_empleados_has_licencias_licencias1_idx');

            $table->unique(["numero_licencia"], 'numero_licencia_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('empleados_id', 'fk_empleados_has_licencias_empleados1_idx')
                ->references('id')->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('licencias_id', 'fk_empleados_has_licencias_licencias1_idx')
                ->references('id')->on('licencias')
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
