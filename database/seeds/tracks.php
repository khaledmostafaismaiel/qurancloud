<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;

class tracks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create() ;
        $users_ids = App\User::all()->pluck('id');
        foreach (range(1,114) as $index){
            \Illuminate\Support\Facades\DB::table('tracks')->insert([
                'user_id'=>$faker->randomElement($users_ids)  ,
                'file_name'=>str_pad($index, 3, '0', STR_PAD_LEFT)."_2.mp3",
                'temp_name'=>str_pad($index, 3, '0', STR_PAD_LEFT)."_2.mp3" ,
                'caption'=>$faker->sentence(10,true) ,
                'created_at'=>$faker->date(now()),

            ]);
        }
    }
}
