<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosIdiomasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'empleados_idiomas';

    /**
     * Run the migrations.
     * @table empleados_idiomas
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('escribe');
            $table->integer('lee');
            $table->integer('habla');
            $table->integer('empleado_id');
            $table->integer('idioma_id');

            $table->index(["idioma_id"], 'fk_empleados_has_idiomas_idiomas1_idx');

            $table->index(["empleado_id"], 'fk_empleados_has_idiomas_empleados1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('idioma_id', 'fk_empleados_has_idiomas_idiomas1_idx')
                ->references('id')->on('idiomas')
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
