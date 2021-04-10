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
        $chatIds = \App\Chat::all()->pluck('id');
        foreach (range(1,5000) as $index){
            $randomChat = \App\Chat::find($faker->randomElement($chatIds));
            $from = 0 ;
            $to = 0 ;
            while ($from == $to){
                $from = $faker->randomElement([$randomChat->from_user_id,$randomChat->to_user_id]) ;
                $to = $faker->randomElement([$randomChat->from_user_id,$randomChat->to_user_id]) ;
            }
            \Illuminate\Support\Facades\DB::table('messages')->insert([
                'chat_id'=>$randomChat->id,
                'from_user_id'=>$from,
                'to_user_id'=>$to,
                'is_read'=>1,
                'body'=>$faker->sentence(10,true) ,
                'created_at'=>$faker->date(now()),

            ]);

        }
    }
}
