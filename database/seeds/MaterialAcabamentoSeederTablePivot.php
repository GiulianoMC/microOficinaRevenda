<?php

use App\Material;
use Illuminate\Database\Seeder;

class MaterialAcabamentoSeederTablePivot extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){

        Material::findOrFail(1)->acabamentos()->sync(1);        // casca de ovo
        Material::findOrFail(2)->acabamentos()->sync([1,2,3]);  // Lona Banner
        Material::findOrFail(3)->acabamentos()->sync([1,4,5]);  // Vinil comum Branco Brilho - Etiquetas - Rótulos
        Material::findOrFail(4)->acabamentos()->sync([1,4,5]);  // Vinil comum Branco Semi-Brilho - Etiquetas - Rótulos
        Material::findOrFail(5)->acabamentos()->sync([6,7]);    // Vinil comum Incolor
        Material::findOrFail(6)->acabamentos()->sync([1,4,5]);  // Vinil Especial - Metálico Prata
        Material::findOrFail(7)->acabamentos()->sync([1,4,5]);  // Vinil Especial - Metálico Ouro
        Material::findOrFail(8)->acabamentos()->sync([1,4,5]);  // Vinil Especial - Holográfico Liso
        Material::findOrFail(9)->acabamentos()->sync([1,4,5]);  // Vinil Especial - Holográfico Quadriculado
        Material::findOrFail(10)->acabamentos()->sync([1,4,5]); // Placa de Sinalização em ACM 3mm - Chapa Mista de Plástico e Alumínio 
        Material::findOrFail(11)->acabamentos()->sync([1,4,5]); // Placa de Sinalização em P.S. 2mm - Chapa Plástica
        Material::findOrFail(12)->acabamentos()->sync([1,4,5]); // Placa de Sinalização em P.S. 0,5mm - Chapa Plástica


    }
}