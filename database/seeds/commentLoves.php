<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;

class commentLoves extends Seeder
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
            \Illuminate\Support\Facades\DB::table('comment_loves')->insert([
                'comment_id'=>$faker->numberBetween(1,500) ,
                'user_id'=>$faker->numberBetween(1,50) ,
                'created_at'=>$faker->date(now()),

            ]);
        }
    }
}
