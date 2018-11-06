<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitulosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'titulos';

    /**
     * Run the migrations.
     * @table titulos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titulo');
            $table->integer('carrera_id');

            $table->index(["carrera_id"], 'fk_carreras_titulos_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('carrera_id', 'fk_carreras_titulos_idx')
                ->references('id')->on('carreras')
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
