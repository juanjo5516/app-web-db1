<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliaresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'familiares';

    /**
     * Run the migrations.
     * @table familiares
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefono', 9);
            $table->string('correo')->nullable();
            $table->integer('empleado_id');
            $table->integer('parentesco_id');

            $table->index(["parentesco_id"], 'fk_familiares_parentescos_idx');

            $table->index(["empleado_id"], 'fk_empleados_familiares_idx');

            $table->unique(["nombre"], 'nombre_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('empleado_id', 'fk_empleados_familiares_idx')
                ->references('id')->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('parentesco_id', 'fk_familiares_parentescos_idx')
                ->references('id')->on('parentescos')
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
