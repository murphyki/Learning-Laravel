<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call(RoleTableSeeder::class);
        //$this->call(UserTableSeeder::class);
        //$this->call(ConfigureAdminsSeeder::class);
        $this->call(NewsTableSeeder::class);

        Model::reguard();
    }
}
