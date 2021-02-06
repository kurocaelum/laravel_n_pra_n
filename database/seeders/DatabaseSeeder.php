<?php

namespace Database\Seeders;

use App\Models\Desenvolvedor;
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
        $this->call(ProjetosSeeder::class);
        $this->call(DesenvolvedoresSeeder::class);
        $this->call(AlocacoesSeeder::class);
    }
}
