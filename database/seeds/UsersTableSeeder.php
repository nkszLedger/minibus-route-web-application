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
        	'email' => 'lmakhi@dot.gov.za',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => bcrypt('password'),
            'employee_id' => '2',
            'remember_token' => 'yes',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $role = Role::create(['name' => 'Systems Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $user = User::create([
        	'email' => 'skunene@dot.gov.za',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => bcrypt('password1'),
            'employee_id' => '3',
            'remember_token' => 'yes',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $role = Role::create(['name' => 'Member Clerk']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
