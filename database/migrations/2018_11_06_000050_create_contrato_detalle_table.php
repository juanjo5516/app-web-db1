<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoDetalleTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'contrato_detalle';

    /**
     * Run the migrations.
     * @table contrato_detalle
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('servicio_id');
            $table->integer('tipo_contrato_id');
            $table->integer('cargo_id');
            $table->integer('unidad_ejecutora_id');
            $table->integer('viceministerio_id');
            $table->integer('dependencia_id');
            $table->integer('direccion_id');
            $table->integer('unidad_pertenece_id');
            $table->integer('ubicacion_id');
            $table->integer('contrato_id');

            $table->index(["unidad_pertenece_id"], 'fk_contrato_detalle_unidad_pertenece_idx');

            $table->index(["cargo_id"], 'fk_contrato_detalle_puestos_idx');

            $table->index(["ubicacion_id"], 'fk_contrato_detalle_ubicacion_idx');

            $table->index(["tipo_contrato_id"], 'fk_contrato_detalle_tipo_contacto_idx');

            $table->index(["direccion_id"], 'fk_contrato_detalle_direcciones_idx');

            $table->index(["servicio_id"], 'fk_contrato_detalle_servicios_idx');

            $table->index(["contrato_id"], 'fk_contrato_contrato_detalle_idx');

            $table->index(["viceministerio_id"], 'fk_contrato_detalle_viceministerios_idx');

            $table->index(["dependencia_id"], 'fk_contrato_detalle_dependencias_idx');

            $table->index(["unidad_ejecutora_id"], 'fk_contratos_detalle_unidad_ejecutora_idx');


            $table->foreign('servicio_id', 'fk_contrato_detalle_servicios_idx')
                ->references('id')->on('servicios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tipo_contrato_id', 'fk_contrato_detalle_tipo_contacto_idx')
                ->references('id')->on('tipo_contrato')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('cargo_id', 'fk_contrato_detalle_puestos_idx')
                ->references('id')->on('cargos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('unidad_ejecutora_id', 'fk_contratos_detalle_unidad_ejecutora_idx')
                ->references('id')->on('unidad_ejectura')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('viceministerio_id', 'fk_contrato_detalle_viceministerios_idx')
                ->references('id')->on('viceministerios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('dependencia_id', 'fk_contrato_detalle_dependencias_idx')
                ->references('id')->on('dependencias')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('direccion_id', 'fk_contrato_detalle_direcciones_idx')
                ->references('id')->on('direcciones')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('unidad_pertenece_id', 'fk_contrato_detalle_unidad_pertenece_idx')
                ->references('id')->on('unidad_pertenece')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ubicacion_id', 'fk_contrato_detalle_ubicacion_idx')
                ->references('id')->on('ubicaciones')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('contrato_id', 'fk_contrato_contrato_detalle_idx')
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
