<?php

use Illuminate\Database\Seeder;

use Faker\Factory as faker ;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
                ]);
            }else{
                \Illuminate\Support\Facades\DB::table('users')->insert([
                    'first_name'=>$faker->firstName ,
                    'second_name'=>$faker->lastName ,
                    'user_name'=>$faker->email ,
                    'hashed_password'=>bcrypt('12345678') ,
                    'gender'=>'female' ,
                    'profile_picture'=>'default_woman_profile_picture.png' ,
                ]);
            }
        }
        foreach (range(1,500) as $index){
            \Illuminate\Support\Facades\DB::table('tracks')->insert([
                'user_id'=>$faker->numberBetween(1,50)  ,
                'file_name'=>$faker->text ,
                'temp_name'=>$faker->text ,
                'caption'=>$faker->sentence(10,true) ,
            ]);
        }
        foreach (range(1,500) as $index){
            \Illuminate\Support\Facades\DB::table('comments')->insert([
                'track_id'=>$faker->numberBetween(1,500) ,
                'user_id'=>$faker->numberBetween(1,50) ,
                'comment'=>$faker->sentence(20,true) ,
            ]);
        }
        foreach (range(1,500) as $index){
            \Illuminate\Support\Facades\DB::table('track_loves')->insert([
                'track_id'=>$faker->numberBetween(1,500) ,
                'user_id'=>$faker->numberBetween(1,50) ,
            ]);
        }
        foreach (range(1,500) as $index){
            \Illuminate\Support\Facades\DB::table('comment_loves')->insert([
                'comment_id'=>$faker->numberBetween(1,500) ,
                'user_id'=>$faker->numberBetween(1,50) ,
            ]);
        }
        foreach (range(1,500) as $index){
            \Illuminate\Support\Facades\DB::table('friends')->insert([
                'follower_user_id'=>$faker->numberBetween(1,50) ,
                'following_user_id'=>$faker->numberBetween(1,50) ,
            ]);
        }


        // $this->call(UserSeeder::class);
    }
}
