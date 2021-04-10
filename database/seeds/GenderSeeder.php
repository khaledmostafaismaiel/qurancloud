<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('genders')->insert([
            'name' => "Male",
        ]);
        \Illuminate\Support\Facades\DB::table('genders')->insert([
            'name' => "Female",
        ]);
    }
}
