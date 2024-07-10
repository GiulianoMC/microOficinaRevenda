<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialMedidaTablePivot extends Migration
{
    public function up()
    {
        Schema::create('material_medida', function (Blueprint $table) {
            $table->unsignedInteger('material_id');

            $table->foreign('material_id', 'material_id_fk_483482')->references('id')->on('materiais')->onDelete('cascade');

            $table->unsignedInteger('medida_id');

            $table->foreign('medida_id', 'medida_id_fk_483482')->references('id')->on('medidas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('material_medida');
    }
}
