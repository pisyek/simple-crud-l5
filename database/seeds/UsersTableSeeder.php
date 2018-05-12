<?php

use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 *
 * @author Hafiz Suhaimi <pisyek@gmail.com>
 * @copyright 2018 Pisyek Studios
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(
            [
                'name' => 'Pisyek',
                'email' => 'pisyek@gmail.com',
                'password' => bcrypt('password'),
            ]
        );
    }
}
