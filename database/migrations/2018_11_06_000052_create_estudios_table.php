<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'estudios';

    /**
     * Run the migrations.
     * @table estudios
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('numero_colegiado', 45)->nullable();
            $table->date('fecha_egreso');
            $table->integer('empleado_id');
            $table->integer('grado_id');
            $table->integer('carrera_id');
            $table->integer('titulo_id');
            $table->integer('centro_id');
            $table->integer('colegio_id')->nullable();
            $table->integer('estado_estudio_id');

            $table->index(["centro_id"], 'fk_centros_estudios_idx');

            $table->index(["empleado_id"], 'fk_empleados_estudios_idx');

            $table->index(["carrera_id"], 'fk_carreras_estudios_idx');

            $table->index(["colegio_id"], 'fk_colegios_estudios_idx');

            $table->index(["grado_id"], 'fk_estudios_grados_idx');

            $table->index(["estado_estudio_id"], 'fk_estado_estudios_estudios_idx');

            $table->index(["titulo_id"], 'fk_estudios_titulos_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('empleado_id', 'fk_empleados_estudios_idx')
                ->references('id')->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('grado_id', 'fk_estudios_grados_idx')
                ->references('id')->on('grados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('carrera_id', 'fk_carreras_estudios_idx')
                ->references('id')->on('carreras')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('titulo_id', 'fk_estudios_titulos_idx')
                ->references('id')->on('titulos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('centro_id', 'fk_centros_estudios_idx')
                ->references('id')->on('centros')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('colegio_id', 'fk_colegios_estudios_idx')
                ->references('id')->on('colegios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('estado_estudio_id', 'fk_estado_estudios_estudios_idx')
                ->references('id')->on('estado_estudios')
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
