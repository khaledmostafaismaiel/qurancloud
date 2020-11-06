<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;

class trackLoves extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create() ;
        foreach (range(1,500) as $index){
            \Illuminate\Support\Facades\DB::table('track_loves')->insert([
                'track_id'=>$faker->numberBetween(1,100) ,
                'user_id'=>$faker->numberBetween(1,50) ,
                'created_at'=>$faker->date(now()),

            ]);
        }
    }
}
