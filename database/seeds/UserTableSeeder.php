<?php

use App\User;
use Bican\Roles\Models\Role;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('12345678') //$faker->word)
            ]);
        }

        $user = User::create([
            'name' => 'Kieran Murphy',
            'email' => 'kierantmurphy@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user = User::create([
            'name' => 'Aoife Roche',
            'email' => 'aoifroche@hotmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
