<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;

class users extends Seeder
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
            if($index % 2){
                \Illuminate\Support\Facades\DB::table('users')->insert([
                    'first_name'=>$faker->firstName ,
                    'second_name'=>$faker->lastName ,
                    'user_name'=>$faker->email ,
                    'hashed_password'=>bcrypt('12345678') ,
                    'gender'=>'male' ,
                    'profile_picture'=>'default_man_profile_picture.png' ,
                    'created_at'=>$faker->date(now()),

                ]);
            }else{
                \Illuminate\Support\Facades\DB::table('users')->insert([
                    'first_name'=>$faker->firstName ,
                    'second_name'=>$faker->lastName ,
                    'user_name'=>$faker->email ,
                    'hashed_password'=>bcrypt('12345678') ,
                    'gender'=>'female' ,
                    'profile_picture'=>'default_woman_profile_picture.png' ,
                    'created_at'=>$faker->date(now()),

                ]);
            }
        }
    }
}
