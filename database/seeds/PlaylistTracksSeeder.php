<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker ;

class PlaylistTracksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create() ;
        $playlist_ids = App\Playlist::all()->pluck('id');
        $tracks_ids = App\Track::all()->pluck('id');
        foreach (range(1,1000) as $index){
            \Illuminate\Support\Facades\DB::table('playlist_tracks')->insert([
                'playlist_id'=>$faker->randomElement($playlist_ids)  ,
                'track_id'=>$faker->randomElement($tracks_ids) ,
                'created_at'=>$faker->date(now())
            ]);
        }
    }
}
