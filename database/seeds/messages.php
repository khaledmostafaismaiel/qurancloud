<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;

class messages extends Seeder
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
        foreach (range(1,50) as $index){
            \Illuminate\Support\Facades\DB::table('messages')->insert([
                'chat_id'=>$index,
                'from_user_id'=>$faker->randomElement($users_ids),
                'to_user_id'=>$faker->randomElement($users_ids),
                'body'=>$faker->sentence(10,true) ,
                'created_at'=>$faker->date(now()),

            ]);

        }
    }
}
