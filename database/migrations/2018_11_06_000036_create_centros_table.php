<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentrosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'centros';

    /**
     * Run the migrations.
     * @table centros
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('centro');
            $table->string('acronimo', 45)->nullable();
            $table->integer('grado_id');

            $table->index(["grado_id"], 'fk_centros_grados_idx');

            $table->unique(["centro"], 'centro_UNIQUE');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('grado_id', 'fk_centros_grados_idx')
                ->references('id')->on('grados')
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
