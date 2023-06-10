<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $managerRole = Role::create(['name' => 'manager']);
        
        // Create permissions
        $createUsersPermission = Permission::create(['name' => 'create users']);
        $editUsersPermission = Permission::create(['name' => 'edit users']);
        
        // Assign permissions to roles
        $adminRole->givePermissionTo($createUsersPermission, $editUsersPermission);
        $managerRole->givePermissionTo($editUsersPermission);
    }
}
