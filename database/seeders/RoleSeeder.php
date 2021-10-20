<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role_admin = Role::create(['name' => 'admin']);
        $role_client = Role::create(["name" => "client"]);

        $permission = Permission::create(['name' => 'delete_ingredient']);
        $permission_panel_admin = Permission::create(['name' => 'access_admin']);
        $role_admin->givePermissionTo(Permission::all());
        //$permission->assignRole($role_admin);
    }
}
