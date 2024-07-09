<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialAcabamentoTablePivot extends Migration
{
    public function up()
    {
        Schema::create('material_acabamento', function (Blueprint $table) {
            $table->unsignedInteger('material_id');

            $table->foreign('material_id', 'material_id_fk_477927')->references('id')->on('material')->onDelete('cascade');

            $table->unsignedInteger('acabamento_id');

            $table->foreign('acabamento_id', 'acabamento_id_fk_477927')->references('id')->on('acabamento')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('material_acabamento');
    }
}
