<?php

use App\Quantidade;
use Illuminate\Database\Seeder;

class QuantidadeSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantidades = [
            [
                'id'             => 1,
                'quantidade'           => 500,
            ],
            [
                'id'             => 2,
                'quantidade'           => 1000,
            ],
            [
                'id'             => 3,
                'quantidade'           => 1500,
            ],
            [
                'id'             => 4,
                'quantidade'           => 2000,
            ],
            [
                'id'             => 5,
                'quantidade'           => 3000,
            ],
            [
                'id'             => 6,
                'quantidade'           => 4000,
            ],
            [
                'id'             => 7,
                'quantidade'           => 5000,
            ],
            [
                'id'             => 8,
                'quantidade'           => 10000,
            ],
        ];

        Quantidade::insert($quantidades);
    }
}
