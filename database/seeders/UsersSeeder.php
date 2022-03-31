<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Factory::create();

        return [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'password' => '1'
        ];

    }
}
