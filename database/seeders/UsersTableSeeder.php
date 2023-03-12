<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'level' => 1,
            'status' => 1,
            'remember_token' => '4HRUaqNDWxMtXTZjFe8XFYHlJopkgCBXyoc3owt1JGs6vdhnP0o9fQossJJv',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
