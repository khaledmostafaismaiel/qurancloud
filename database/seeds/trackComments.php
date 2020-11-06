<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;

class trackComments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create() ;
        foreach (range(1,1000) as $index){
            \Illuminate\Support\Facades\DB::table('comments')->insert([
                'track_id'=>$faker->numberBetween(1,100) ,
                'user_id'=>$faker->numberBetween(1,50) ,
                'comment'=>$faker->sentence(20,true) ,
                'created_at'=>$faker->date(now())
            ]);
        }
    }
}
