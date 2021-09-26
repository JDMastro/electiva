<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StartupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Startup::factory(120)->create();
        
        
        
    }
}
