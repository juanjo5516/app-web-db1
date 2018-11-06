<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'direcciones';

    /**
     * Run the migrations.
     * @table direcciones
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('direccion', 45);
            $table->integer('dependencia_id');

            $table->index(["dependencia_id"], 'fk_dependencias_direcciones_idx');

            $table->unique(["direccion"], 'direccion_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('dependencia_id', 'fk_dependencias_direcciones_idx')
                ->references('id')->on('dependencias')
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
