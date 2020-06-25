<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'employee-list',
           'employee-create',
           'employee-edit',
           'employee-delete',
           'member-list',
           'member-create',
           'member-edit',
           'member-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'view-dashboard',

        ];

        foreach ($permissions as $permission) {

             Permission::create(['name' => $permission]);
        }

    }

}