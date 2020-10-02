<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'admin@admin.com',
            'status' => 1,
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
