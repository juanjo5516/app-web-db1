<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'empleados';

    /**
     * Run the migrations.
     * @table empleados
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('dpi', 45);
            $table->string('nit', 45);
            $table->string('afiliacion_igss', 45)->nullable();
            $table->string('nombre1', 45);
            $table->string('nombre2', 45)->nullable();
            $table->string('nombre3', 45)->nullable();
            $table->string('apellido1', 45);
            $table->string('apellido2', 45)->nullable();
            $table->string('apellido3', 45)->nullable();
            $table->string('apellido_casada', 45)->nullable();
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento', 45);
            $table->integer('genero_id');
            $table->integer('estado_civil_id');
            $table->integer('pueblo_id');
            $table->integer('comunidad_id');
            $table->integer('nacionalidad_id');
            $table->string('fotografia')->nullable();

            $table->index(["estado_civil_id"], 'fk_empleados_estado_civil_idx');

            $table->index(["nacionalidad_id"], 'fk_empleados_nacionalidad_idx');

            $table->index(["pueblo_id"], 'fk_empleados_pueblos_idx');

            $table->index(["genero_id"], 'fk_empleados_generos_idx');

            $table->index(["comunidad_id"], 'fk_comunidades_empleados_idx');

            $table->unique(["dpi"], 'dpi_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('genero_id', 'fk_empleados_generos_idx')
                ->references('id')->on('generos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('estado_civil_id', 'fk_empleados_estado_civil_idx')
                ->references('id')->on('estado_civil')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pueblo_id', 'fk_empleados_pueblos_idx')
                ->references('id')->on('pueblos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('comunidad_id', 'fk_comunidades_empleados_idx')
                ->references('id')->on('comunidades')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('nacionalidad_id', 'fk_empleados_nacionalidad_idx')
                ->references('id')->on('nacionalidades')
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
