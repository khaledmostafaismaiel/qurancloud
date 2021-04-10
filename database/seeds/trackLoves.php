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
        $users_ids = App\User::all()->pluck('id');
        $tracks_ids = App\Track::all()->pluck('id');
        foreach (range(1,500) as $index){
            \Illuminate\Support\Facades\DB::table('track_loves')->insert([
                'track_id'=>$faker->randomElement($tracks_ids) ,
                'user_id'=>$faker->randomElement($users_ids)  ,
                'created_at'=>$faker->date(now()),

            ]);
        }
    }
}
