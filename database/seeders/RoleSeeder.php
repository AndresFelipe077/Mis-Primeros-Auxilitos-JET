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
        $role1 = Role::create(['name' => 'Admin']);

        Permission::create(['name' => 'admin'])->assignRole($role1); // View screen of dashboard for admin

        Permission::create(['name' => 'admin.user'])->assignRole($role1); // View screen of users for admin

        Permission::create(['name' => 'admin.contenido'])->assignRole($role1); // View screen of content for admin

    }
}
