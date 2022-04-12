<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $faker = Factory::create('ru_RU');
        $statusList = ["DRAFT", "ACTIVE", "BLOCKED"];
        $data = [];
        for ($i = 0; $i < 9; $i++) {
            $data[] = [
                'category_id' => mt_rand(1, 5),
                'title' => $faker->sentence(rand(3, 5)),
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(376, 299),
                'status' => $statusList[mt_rand(0, 2)],
                'description' => $faker->text(100),
            ];
        }
        return $data;
    }
}
