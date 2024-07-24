<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPrecosTable extends Migration
{
    public function up()
    {
        Schema::table('precos', function (Blueprint $table) {
            $table->unsignedInteger('material_id');

            $table->foreign('material_id', 'material_fk_484540')->references('id')->on('materiais');
        });

        Schema::table('precos', function (Blueprint $table) {
            $table->unsignedInteger('medida_id')->nullable();

            $table->foreign('medida_id', 'medida_fk_484540')->references('id')->on('medidas');
        });

        Schema::table('precos', function (Blueprint $table) {
            $table->unsignedInteger('quantidade_id')->nullable();

            $table->foreign('quantidade_id', 'quantidade_fk_484540')->references('id')->on('quantidades');
        });
    }
}
