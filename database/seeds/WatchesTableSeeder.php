<?php

use App\Watch;
use Illuminate\Database\Seeder;

class WatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $watch =  New Watch;
        $watch -> brand_id = '1';
        $watch -> model_id = '1';
        $watch -> movement = 'Automatic';
        $watch -> gender = 'Mens Timepiece';
        $watch -> save();

        $watch1 =  New Watch;
        $watch1 -> brand_id = '1';
        $watch1 -> model_id = '2';
        $watch1 -> movement = 'Automatic';
        $watch1 -> gender = 'Herrenuhr';
        $watch1 -> save();

        $watch2 =  New Watch;
        $watch2 -> brand_id = '2';
        $watch2 -> model_id = '1';
        $watch2 -> movement = 'Automatic';
        $watch2 -> gender = 'Damenuhr';
        $watch2 -> save();


        $watch2 =  New Watch;
        $watch2 -> brand_id = '2';
        $watch2 -> model_id = '1';
        $watch2 -> movement = 'Automatic';
        $watch2 -> gender = 'Damenuhr';
        $watch2 -> save();

    }
}
