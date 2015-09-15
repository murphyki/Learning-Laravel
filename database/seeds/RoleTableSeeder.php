<?php

use Illuminate\Database\Seeder;
use \Bican\Roles\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create([
            'name' => 'Super Admin',
            'slug' => 'super.admin',
            'description' => 'Super Administrator Role', // optional
            'level' => 1, // optional, set to 1 by default
        ]);

        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrator Role', // optional
            'level' => 1, // optional, set to 1 by default
        ]);
    }
}
