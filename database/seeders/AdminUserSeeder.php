<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserPermissions;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
        ], [
            'description' => 'Administrator role with full permissions',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $adminUser = User::firstOrCreate([
            'email' => 'mjay@admin.com',
        ], [
            'name' => 'Admin User',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Fetch all permissions
        $permissions = DB::table('permissions')->pluck('id');

        foreach ($permissions as $permissionId) {
            UserPermissions::firstOrCreate([
                'user_id' => $adminUser->id,
                'permission_id' => $permissionId,
            ], [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
