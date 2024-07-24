<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(AcabamentoSeederTable::class);
        $this->call(MaterialSeederTable::class);
        $this->call(QuantidadeSeederTable::class);
        $this->call(MedidaSeederTable::class);
        $this->call(MaterialQuantidadeSeederTablePivot::class);
        $this->call(MaterialMedidaSeederTablePivot::class);
        $this->call(MaterialAcabamentoSeederTablePivot::class);
        $this->call(PrecoSeederTable::class);
    }
}
