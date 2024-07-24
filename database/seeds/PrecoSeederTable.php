<?php

use App\Preco;
use Illuminate\Database\Seeder;

class PrecoSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $precos = [
            [
                "id" => 1,
                "impressao" => null,
                "tem_acabamento" => "N",
                "tipo_acabamento" => null,
                "preco" => 10.0,
                "created_at" => null,
                "updated_at" => null,
                "material_id" => 1,
                "medida_id" => 1,
                "quantidade_id" => 1
            ],
            [
                "id" => 2,
                "impressao" => null,
                "tem_acabamento" => "N",
                "tipo_acabamento" => null,
                "preco" => 10.0,
                "created_at" => null,
                "updated_at" => null,
                "material_id" => 1,
                "medida_id" => 2,
                "quantidade_id" => 1
            ],
            [
                "id" => 3,
                "impressao" => null,
                "tem_acabamento" => "N",
                "tipo_acabamento" => null,
                "preco" => 13.0,
                "created_at" => null,
                "updated_at" => null,
                "material_id" => 1,
                "medida_id" => 3,
                "quantidade_id" => 1
            ]
        ];

        Preco::insert($precos);


    }
}
