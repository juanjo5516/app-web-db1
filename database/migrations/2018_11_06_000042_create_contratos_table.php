<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'contratos';

    /**
     * Run the migrations.
     * @table contratos
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
            $table->date('fecha_fin');
            $table->decimal('monto', 10, 2);
            $table->integer('empleado_id');
            $table->integer('renglon_id');
            $table->integer('regimen_id')->nullable();
            $table->integer('estado_contrato_id');

            $table->index(["renglon_id"], 'fk_contratos_renglones_idx');

            $table->index(["empleado_id"], 'fk_contratos_empleados_idx');

            $table->index(["estado_contrato_id"], 'fk_contratos_estados_idx');

            $table->index(["regimen_id"], 'fk_contratos_regimenes_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('empleado_id', 'fk_contratos_empleados_idx')
                ->references('id')->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('renglon_id', 'fk_contratos_renglones_idx')
                ->references('id')->on('renglones')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('regimen_id', 'fk_contratos_regimenes_idx')
                ->references('id')->on('regimenes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('estado_contrato_id', 'fk_contratos_estados_idx')
                ->references('id')->on('estado_contratos')
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
