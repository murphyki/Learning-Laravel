<?php

use Illuminate\Database\Seeder;
use App\User;
use Bican\Roles\Models\Role;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $role = Role::find(1);
        $user->attachRole($role);
    }
}
