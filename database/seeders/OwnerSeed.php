<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            'FULL_NAME' => 'Admin',
            'EMAIL_ADDRESS' => 'admin@affiliatezone.com',
            'PASSWORD' => 'admin',
            'created_at' => date('Y-m-d'),
        ]);
    }
}
