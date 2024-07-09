<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialQuantidadeTablePivot extends Migration
{
    public function up()
    {
        Schema::create('material_quantidade', function (Blueprint $table) {
            $table->unsignedInteger('material_id');

            $table->foreign('material_id', 'material_id_fk_477936')->references('id')->on('material')->onDelete('cascade');

            $table->unsignedInteger('quantidade_id');

            $table->foreign('quantidade_id', 'quantidade_id_fk_477936')->references('id')->on('quantidade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('material_quantidade');
    }
}
