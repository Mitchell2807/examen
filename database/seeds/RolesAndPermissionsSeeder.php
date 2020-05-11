<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //cache legen
        app()['cache']->forget('spatie.permission.cache');

        //verschillende permissies aanmaken.
        Permission::create(['name' => 'create reservations']);
        Permission::create(['name' => 'edit reservations']);
        Permission::create(['name' => 'delete reservations']);

        //rollen maken en hier permissies aan koppelen.
        $role = Role::create(['name' => 'customer']);
        $role->givePermissionTo('create reservations', 'delete reservations');

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
