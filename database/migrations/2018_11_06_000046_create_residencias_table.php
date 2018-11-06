<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidenciasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'residencias';

    /**
     * Run the migrations.
     * @table residencias
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('direccion');
            $table->string('colonia')->nullable();
            $table->integer('empleado_id');
            $table->integer('departamento_id');
            $table->integer('municipio_id');
            $table->integer('zona_id');

            $table->index(["departamento_id"], 'fk_departamentos_residencias_idx');

            $table->index(["empleado_id"], 'fk_empleados_residencias_idx1');

            $table->index(["municipio_id"], 'fk_municipios_residencias_idx');

            $table->index(["zona_id"], 'fk_residencias_zonas_idx');

            $table->unique(["direccion"], 'direccion_UNIQUE');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('empleado_id', 'fk_empleados_residencias_idx1')
                ->references('id')->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('departamento_id', 'fk_departamentos_residencias_idx')
                ->references('id')->on('departamentos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('municipio_id', 'fk_municipios_residencias_idx')
                ->references('id')->on('municipios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('zona_id', 'fk_residencias_zonas_idx')
                ->references('id')->on('zonas')
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
