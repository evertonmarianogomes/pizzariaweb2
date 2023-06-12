<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        
        // // create permissions
        // Permission::create(['name' => 'create users']);
        // Permission::create(['name' => 'edit users']);
        // Permission::create(['name' => 'delete users']);

        // Permission::create(['name' => 'edit pizza']);


        // $role = Role::create(['name' => 'moderator'])
        //     ->givePermissionTo(['edit pizza']);

        $role = Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());

    }
}
