<?php

use App\Acabamento;
use Illuminate\Database\Seeder;

class AcabamentoSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $acabamentos = [
            [
                'id'             => 1,
                'nome'           => 'Sem Acabamento',
            ],
            [
                'id'             => 2,
                'nome'           => 'Tubete+Cordão',
            ],
            [
                'id'             => 3,
                'nome'           => 'Ilhós',
            ],
            [
                'id'             => 4,
                'nome'           => 'Laminação Brilho',
            ],
            [
                'id'             => 5,
                'nome'           => 'Laminação Fosca',
            ],
            [
                'id'             => 6,
                'nome'           => 'Brilhoso',
            ],
            [
                'id'             => 7,
                'nome'           => 'Fosco(jateado)',
            ],
        ];

        Acabamento::insert($acabamentos);
    }
}
