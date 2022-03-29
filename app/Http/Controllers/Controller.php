<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Faker\Factory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_news(?int $id = null): array|object
    {

        $faker = Factory::create();
        $statuses = ['Published', 'Unpublished', 'Draft'];
        $categories = [1 => "Domestic", 2 => "Foreign"];

        if ($id) {

            $category_id = rand(1, 2);

            return (object)[
                'id' => $id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(250, 170),
                'status' => $statuses[mt_rand(0, 2)],
                'description' => $faker->text(500),
                'short_description' => $faker->text(30),
                'category_id' => $category_id,
                'category_name' => $categories[$category_id],
            ];
        }

        $news_array = [];
        $id = 0;

        for ($i = 0; $i < 11; $i++) {

            $category_id = rand(1, 2);

            $news_array[] = (object)[
                'id' => ++$id,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(250, 170),
                'status' => $statuses[mt_rand(0, 2)],
                'description' => $faker->text(500),
                'short_description' => $faker->text(30),
                'category_id' => $category_id,
                'category_name' => $categories[$category_id],
            ];

        }

        return $news_array;

    }

    public function get_categories():array
    {
        return [
            (object)[
                'ID' => 1,
                'category_name' => "Domestic"
            ],
            (object)[
                'ID' => 2,
                'category_name' => "Foreign"
            ]
        ];
    }


}
