<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;

class chats extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create() ;
        foreach (range(1,50) as $index){
            \Illuminate\Support\Facades\DB::table('chats')->insert([
                'id'=>$index,
                'created_at'=>$faker->date(now()),
            ]);
        }
    }
}
