<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'manager', 'description' => 'Manager with limited access', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user', 'description' => 'Regular user with basic access', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
