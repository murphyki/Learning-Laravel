<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;

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
          'name'=>'admin',
          'slug'=>'admin',
          'description'=>'Administrator Role',
          'level'=>1
        ]);
    }
}
