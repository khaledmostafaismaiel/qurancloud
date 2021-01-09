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
        foreach (range(1,100) as $index){
            \Illuminate\Support\Facades\DB::table('tracks')->insert([
                'user_id'=>$faker->randomElement($users_ids)  ,
                'file_name'=>$faker->sentence(5,true) ,
                'temp_name'=>$faker->text ,
                'caption'=>$faker->sentence(10,true) ,
                'created_at'=>$faker->date(now()),

            ]);
        }
    }
}
