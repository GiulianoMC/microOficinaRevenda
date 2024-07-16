<?php

use App\Material;
use Illuminate\Database\Seeder;

class MaterialMedidaSeederTablePivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::findOrFail(1)->medidas()->sync([1,2,3,4,5,6,7,8,9,10]);
        Material::findOrFail(2)->medidas()->sync([11,12,13,14,15,16,17,18,19]);
        Material::findOrFail(10)->medidas()->sync([20,21,22,23,24,25,26,27,28]);
        Material::findOrFail(11)->medidas()->sync([20,21,22,23,24,25,26,27,28]);
        Material::findOrFail(12)->medidas()->sync([20,21,22,23,24,25,26,27,28]);
    }
}