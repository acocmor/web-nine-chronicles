<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username'=>'admin',
            'password'=>bcrypt('bhBHJb124@)1cqa!@_'),
        ]);
        DB::table('users')->insert([
            'username'=>'admin2',
            'password'=>bcrypt('basfQ@%@v_qa!@_'),
        ]);
    }
}
