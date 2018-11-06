<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacacionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'vacaciones';

    /**
     * Run the migrations.
     * @table vacaciones
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('fecha_salida');
            $table->date('fecha_entrada');
            $table->string('observacion')->nullable();
            $table->integer('contrato_id');

            $table->index(["contrato_id"], 'fk_contratos_vacaciones_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('contrato_id', 'fk_contratos_vacaciones_idx')
                ->references('id')->on('contratos')
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
