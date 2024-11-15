<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = ['Administrator', 'User'];
        foreach ($roles as $key => $value) {
            DB::table('roles')->insert([
                'name' => $value,
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $permissions = ["ActionLayanan", "ActionCategory", "ActionPost", "Not Available", "DoneLayanan"];
        foreach ($permissions as $key => $value) {
            DB::table('permissions')->insert([
                'name' => $value,
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $role_has_permissions = [
            '1' => ['1', '2', '3', '4', '5'],
        ];
        foreach ($role_has_permissions as $role_id => $permissions) {
            foreach ($permissions as $permission_id) {
                DB::table('role_has_permissions')->insert([
                    'permission_id' => $permission_id,
                    'role_id' => $role_id
                ]);
            }
        }

        $user = new User([
            'name' => "Administrator",
            'email' => "administrator@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt("password")
        ]);
        $user->save();
        $user->assignRole('Administrator');
    }
}
