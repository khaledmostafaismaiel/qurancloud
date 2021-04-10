<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;

class Chats extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create() ;
        $userIds = \App\User::all()->pluck('id');

        foreach (range(1,500) as $index){
            $from = 0;
            $to = 0 ;
            while($from == $to){
                $from = $faker->randomElement($userIds) ;
                $to = $faker->randomElement($userIds);
            }
            \Illuminate\Support\Facades\DB::table('chats')->insert([
                'created_at'=>$faker->date(now()),
                'from_user_id'=>$from,
                'to_user_id'=>$to,
            ]);
        }
    }
}
