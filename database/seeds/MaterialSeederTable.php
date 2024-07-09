<?php

use App\Material;
use Illuminate\Database\Seeder;

class MaterialSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materiais = [
            [
                'id'             => 1,
                'nome'           => 'Lacre de Segurança - Casca de Ovo',
            ],
            [
                'id'             => 2,
                'nome'           => 'Lona Banner',
            ],
            [
                'id'             => 3,
                'nome'           => 'Vinil comum Branco Brilho - Etiquetas - Rótulos',
            ],
            [
                'id'             => 4,
                'nome'           => 'Vinil comum Branco Semi-Brilho - Etiquetas - Rótulos',
            ],
            [
                'id'             => 5,
                'nome'           => 'Vinil comum Incolor',
            ],
            [
                'id'             => 6,
                'nome'           => 'Vinil Especial - Metálico Prata',
            ],
            [
                'id'             => 7,
                'nome'           => 'Vinil Especial - Metálico Ouro',
            ],
            [
                'id'             => 8,
                'nome'           => 'Vinil Especial - Holográfico Liso',
            ],
            [
                'id'             => 9,
                'nome'           => 'Vinil Especial - Holográfico Quadriculado',
            ],
            [
                'id'             => 10,
                'nome'           => 'Placa de Sinalização em ACM 3mm - Chapa Mista de Plástico e Alumínio',
            ],
            [
                'id'             => 11,
                'nome'           => 'Placa de Sinalização em P.S. 2mm - Chapa Plástica',
            ],
            [
                'id'             => 12,
                'nome'           => 'Placa de Sinalização em P.S. 0,5mm - Chapa Plástica',
            ],

        ];

        Material::insert($materiais);
    }
}
