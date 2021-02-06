<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(['nome'=>'Gilso da Capoeira', 'campo'=>'Analista Pleno']);
        DB::table('desenvolvedores')->insert(['nome'=>'Boy dos Coco', 'campo'=>'Analista Senior']);
        DB::table('desenvolvedores')->insert(['nome'=>'Mimas Turb', 'campo'=>'Programador Jr']);
    }
}
