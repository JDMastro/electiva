<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roleData = [
            ["description" => "Client"],
            ["description" => "Director"]
        ];

        \App\Models\Role::insert($roleData);
        
    }
}
