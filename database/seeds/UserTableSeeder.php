<?php

use Illuminate\Database\Seeder;
use \App\User;
use Faker\Factory;

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

        for ($i = 0; $i < 10; $i++)
        {
            $user = User::create(array(
                'name' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt($faker->word)
            ));
        }

        User::create(array(
            'name' => 'Kieran Murphy',
            'email' => 'kierantmurphy@gmail.com',
            'password' => bcrypt('12345678')
        ));

        User::create(array(
            'name' => 'Aoife Roche',
            'email' => 'aoifroche@hotmail.com',
            'password' => bcrypt('12345678')
        ));
    }
}
