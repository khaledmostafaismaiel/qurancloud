<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;
use App\Gender;
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

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'first_name'=>"Khaled" ,
            'second_name'=>"Mostafa" ,
            'user_name'=>"khaledmostafa297@gmail.com" ,
            'hashed_password'=>bcrypt('12345678') ,
            'from'=>66,
            'lives'=>66,
            'study'=>'Faculty of science Alexandria university',
            'work'=>'Back-End Web Developer at Arabic Localizer',
            'gender'=>1 ,
            'profile_picture'=>'default_profile_picture.png' ,
            'cover_picture'=>'default_cover_picture.jpg' ,
            'created_at'=>$faker->date(now()),
        ]);
        $genders = Gender::all()->pluck('id');
        foreach (range(1,100) as $index){
            if( $faker->numberBetween(1,2) == USER_GENDER_MALE){
                \Illuminate\Support\Facades\DB::table('users')->insert([
                    'first_name'=>$faker->firstNameMale ,
                    'second_name'=>$faker->lastName ,
                    'user_name'=>$faker->unique()->safeEmail ,
                    'hashed_password'=>bcrypt('12345678') ,
                    'from'=>$faker->numberBetween(1,249),
                    'lives'=>$faker->numberBetween(1,249),
                    'gender'=>1 ,
                    'profile_picture'=>'default_male_profile_picture.png' ,
                    'cover_picture'=>'default_cover_picture.png' ,
                    'created_at'=>$faker->date(now()),
                ]);
            }else{
                \Illuminate\Support\Facades\DB::table('users')->insert([
                    'first_name'=>$faker->firstNameFemale ,
                    'second_name'=>$faker->lastName ,
                    'user_name'=>$faker->unique()->safeEmail ,
                    'hashed_password'=>bcrypt('12345678') ,
                    'from'=>$faker->numberBetween(1,249),
                    'lives'=>$faker->numberBetween(1,249),
                    'gender'=>2 ,
                    'profile_picture'=>'default_female_profile_picture.png' ,
                    'cover_picture'=>'default_cover_picture.png' ,
                    'created_at'=>$faker->date(now()),
                ]);
            }
        }
    }
}
