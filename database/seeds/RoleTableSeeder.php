<?php

use Bican\Roles\Models\Role;
use Illuminate\Database\Seeder;

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
            'name' => 'Guest',
            'slug' => 'guest',
            'description' => 'Guest Role', // optional
            'level' => 1, // optional, set to 1 by default
        ]);

        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrator Role', // optional
            'level' => 1, // optional, set to 1 by default
        ]);

        Role::create([
            'name' => 'Super Admin',
            'slug' => 'super.admin',
            'description' => 'Super Administrator Role', // optional
            'level' => 1, // optional, set to 1 by default
        ]);
    }
}
