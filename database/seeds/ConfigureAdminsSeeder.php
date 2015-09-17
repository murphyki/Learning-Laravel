<?php

use App\User;
use Bican\Roles\Models\Role;
use Illuminate\Database\Seeder;

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

        $guestRole = Role::where('slug', '=', 'guest')->firstOrFail();
        $superAdminRole = Role::where('slug', '=', 'super.admin')->firstOrFail();
        $adminRole = Role::where('slug', '=', 'admin')->firstOrFail();

        $users = User::all();
        foreach ($users as $user)
        {
            $user->attachRole($guestRole);
        }

        $me = User::where('email', '=', 'kierantmurphy@gmail.com')->firstOrFail();
        $me->attachRole($superAdminRole);
        $me->attachRole($adminRole);

        $aoife = User::where('email', '=', 'aoifroche@hotmail.com')->firstOrFail();
        $aoife->attachRole($adminRole);
    }
}
