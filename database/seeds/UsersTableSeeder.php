<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Luma',
            'surname' => 'Makhi',
        	'email' => 'lmakhi@dot.gov.za',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => bcrypt('password'),
            'remember_token' => 'yes',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $role = Role::create(['name' => 'Systems Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'Sam',
            'surname' => 'Kunene',
        	'email' => 'skunene@dot.gov.za',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => bcrypt('password1'),
            'remember_token' => 'yes',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $role = Role::create(['name' => 'Data Capturer']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $role = Role::create(['name' => 'Oversight']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
    }
}
