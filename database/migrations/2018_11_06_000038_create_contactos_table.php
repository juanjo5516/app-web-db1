<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'contactos';

    /**
     * Run the migrations.
     * @table contactos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('contacto', 45);
            $table->integer('empleado_id');
            $table->integer('medio_contacto_id');

            $table->index(["empleado_id"], 'fk_empleado_idx');

            $table->index(["medio_contacto_id"], 'fk_medio_contactos_idx');

            $table->unique(["contacto"], 'contactos_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('empleado_id', 'fk_empleado_idx')
                ->references('id')->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('medio_contacto_id', 'fk_medio_contactos_idx')
                ->references('id')->on('medio_contactos')
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
