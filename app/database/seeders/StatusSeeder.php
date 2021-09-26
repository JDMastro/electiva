<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $statusData = [
            ["description"=>"10%"],
            ["description"=>"20%"],
            ["description"=>"30%"],
            ["description"=>"40%"],
            ["description"=>"50%"],
            ["description"=>"60%"],
            ["description"=>"70%"],
            ["description"=>"80%"],
            ["description"=>"90%"],
            ["description"=>"100%"],
        ];

        \App\Models\Statu::insert($statusData);
    }
}
