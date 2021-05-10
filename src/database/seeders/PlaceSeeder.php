<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('places')->truncate();
        
        DB::table('places')->insert([
            ['name'=>'Tokyo','visited'=>0],
            ['name'=>'Sai Gon','visited'=>1],
            ['name'=>'Ha Noi','visited'=>0],
        ]);
    }
}
