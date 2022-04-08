<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $categories = \DB::table('categories')->get();

        $categories_count = $categories->count();
        $statuses = ['Published', 'Unpublished', 'Draft'];


        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'title' => $faker->jobTitle(),
                'image' => $faker->imageUrl(250, 170),
                'description' => $faker->text(750),
                'short_description' => $faker->text(250),
                'status' => $statuses[mt_rand(0, 2)],
                'author' => 1,
                'category_id' => $categories[mt_rand(1, $categories_count-1)]->id,
            ];
        }

        return $data;
    }


}
