<?php

use App\Medida;
use Illuminate\Database\Seeder;

class MedidaSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medidas = [
            [
                'id'             => 1,
                'medida'           => '1x1',
            ],
            [
                'id'             => 2,
                'medida'           => '2x1',
            ],
            [
                'id'             => 3,
                'medida'           => '3x1',
            ],
            [
                'id'             => 4,
                'medida'           => '3x2',
            ],
            [
                'id'             => 5,
                'medida'           => '1,5x1',
            ],
            [
                'id'             => 6,
                'medida'           => '3x1,5',
            ],
            [
                'id'             => 7,
                'medida'           => '2x2',
            ],
            [
                'id'             => 8,
                'medida'           => '1x5',
            ],
            [
                'id'             => 9,
                'medida'           => '2x5',
            ],
            [
                'id'             => 10,
                'medida'           => '4x1',
            ],
            [
                'id'             => 11,
                'medida'           => '40x50',
            ],
            [
                'id'             => 12,
                'medida'           => '50x80',
            ],
            [
                'id'             => 13,
                'medida'           => '60x100',
            ],
            [
                'id'             => 14,
                'medida'           => '80x120',
            ],
            [
                'id'             => 15,
                'medida'           => '100x150',
            ],
            [
                'id'             => 16,
                'medida'           => '40x60',
            ],
            [
                'id'             => 17,
                'medida'           => '60x90',
            ],
            [
                'id'             => 18,
                'medida'           => '100x100',
            ],
            [
                'id'             => 19,
                'medida'           => '100x120',
            ],
            [
                'id'             => 20,
                'medida'           => 'A0-120x84',
            ],

            [
                'id'             => 21,
                'medida'           => 'A1-60x84',
            ],
            [
                'id'             => 22,
                'medida'           => 'A2-60x42',
            ],
            [
                'id'             => 23,
                'medida'           => 'A3-42x30',
            ],
            [
                'id'             => 24,
                'medida'           => 'A4-20x30',
            ],
            [
                'id'             => 25,
                'medida'           => 'A5-20x15',
            ],
            [
                'id'             => 26,
                'medida'           => 'A6-10x15',
            ],
            [
                'id'             => 27,
                'medida'           => '10x7,5',
            ],
            [
                'id'             => 28,
                'medida'           => '5x7,5',
            ],
        ];

        Medida::insert($medidas);
    }
}
