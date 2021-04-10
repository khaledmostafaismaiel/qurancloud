<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create() ;
        $users_ids = App\User::all()->pluck('id')->count();
        foreach (range(1,$users_ids) as $index){
            \Illuminate\Support\Facades\DB::table('playlists')->insert([
                'user_id'=>$index  ,
                'created_at'=>$faker->date(now())
            ]);
        }
    }
}
