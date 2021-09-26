<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\User::factory(100)->create();

        $roles = \App\Models\Role::all();

        \App\Models\User::all()->each(function ($user) use ($roles) { 
            $user->roles()->attach(
                $roles->random(Rand(1, 2))->pluck('id')->toArray()
            ); 
        });
    }
}
