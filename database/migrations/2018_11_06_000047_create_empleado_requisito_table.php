<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoRequisitoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'empleado_requisito';

    /**
     * Run the migrations.
     * @table empleado_requisito
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('empleado_id');
            $table->integer('requisito_id');
            $table->integer('estado_id');
            $table->string('path')->nullable();
            $table->string('observacion')->nullable();

            $table->index(["estado_id"], 'fk_empleado_requisito_estado_idx');

            $table->index(["requisito_id"], 'fk_requisitos_idx');

            $table->index(["empleado_id"], 'fk_empleados_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('empleado_id', 'fk_empleados_idx')
                ->references('id')->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('requisito_id', 'fk_requisitos_idx')
                ->references('id')->on('requisitos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('estado_id', 'fk_empleado_requisito_estado_idx')
                ->references('id')->on('estados')
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
