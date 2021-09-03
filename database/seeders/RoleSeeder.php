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
        $role2 = Role::create(['name' => 'User1']);

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'services.index'])->assignRole($role1);
        Permission::create(['name' => 'services.store'])->assignRole($role1);
        Permission::create(['name' => 'services.show'])->assignRole($role1);
        Permission::create(['name' => 'services.update'])->assignRole($role1);
        Permission::create(['name' => 'services.destroy'])->assignRole($role1);

        Permission::create(['name' => 'createreservations.store'])->assignRole($role2);
        Permission::create(['name' => 'createreservations.show'])->assignRole($role2);

        Permission::create(['name' => 'reservations.show'])->assignRole($role1);
       

    }
}
