<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KindofStartupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kindStartupData = [
            ["name"=>"Android"],
            ["name"=>"IOS"],
            ["name"=>"Desktop"],
            ["name"=>"Web"],
        ];

        \App\Models\Kindstartup::insert($kindStartupData);
       
    }
}
