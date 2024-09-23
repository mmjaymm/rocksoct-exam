<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['name' => 'task-delete', 'description' => 'Permission to delete tasks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'task-update', 'description' => 'Permission to update tasks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'task-view', 'description' => 'Permission to view tasks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'task-create', 'description' => 'Permission to create tasks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'task-assigning', 'description' => 'Permission to assign tasks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user-create', 'description' => 'Permission to create users', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user-delete', 'description' => 'Permission to delete users', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user-view', 'description' => 'Permission to view users', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'user-update', 'description' => 'Permission to update users', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'profile-edit', 'description' => 'Permission to edit profiles', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'profile-view', 'description' => 'Permission to view profiles', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'profile-delete', 'description' => 'Permission to delete profiles', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
