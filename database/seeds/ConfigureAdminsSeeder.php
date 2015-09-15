<?php

use Illuminate\Database\Seeder;
use \App\User;
use \Bican\Roles\Models\Role;

class ConfigureAdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->delete();

        $superAdminRole = Role::where('slug', '=', 'super.admin')->firstOrFail();
        $adminRole = Role::where('slug', '=', 'admin')->firstOrFail();

        $me = User::where('email', '=', 'kierantmurphy@gmail.com')->firstOrFail();
        $me->attachRole($superAdminRole);
        $me->attachRole($adminRole);

        $aoife = User::where('email', '=', 'aoifroche@hotmail.com')->firstOrFail();
        $aoife->attachRole($adminRole);
    }
}
