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
//        $this->call('CountrySeeder');
        $this->call('GenderSeeder');
//        $this->call('users');
//        $this->call('tracks');
//        $this->call('PlaylistSeeder');
//        $this->call('PlaylistTracksSeeder');
//        $this->call('trackComments');
//        $this->call('trackLoves');
//        $this->call('commentLoves');
//        $this->call('Friends');
//        $this->call('Chats');
//        $this->call('messages');
    }
}
