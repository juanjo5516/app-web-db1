<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'municipios';

    /**
     * Run the migrations.
     * @table municipios
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('municipio');
            $table->integer('departamento_id');

            $table->index(["departamento_id"], 'fk_departamentos_municipios_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('departamento_id', 'fk_departamentos_municipios_idx')
                ->references('id')->on('departamentos')
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
