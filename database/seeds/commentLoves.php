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
        $users_ids = App\User::all()->pluck('id');
        $Comments_ids = App\Comment::all()->pluck('id');
        foreach (range(1,500) as $index){
            \Illuminate\Support\Facades\DB::table('comment_loves')->insert([
                'comment_id'=>$faker->randomElement($Comments_ids) ,
                'user_id'=>$faker->randomElement($users_ids) ,
                'created_at'=>$faker->date(now()),

            ]);
        }
    }
}
