<?php

use App\Material;
use Illuminate\Database\Seeder;

class MaterialQuantidadeSeederTablePivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::findOrFail(1)->quantidades()->sync([1,2,3,4,5,6,7,8]);
    }
}
