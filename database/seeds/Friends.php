<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;

class Friends extends Seeder
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
        foreach (range(1,500) as $index){
            \Illuminate\Support\Facades\DB::table('friends')->insert([
                'follower_user_id'=>$faker->randomElement($users_ids),
                'following_user_id'=>$faker->randomElement($users_ids),
                'created_at'=>$faker->date(now()),

            ]);
        }
    }
}
