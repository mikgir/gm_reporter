<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'title'=>'Политика',
                'description'=>'Новости политики'
            ],
            [
                'title'=>'Спорт',
                'description'=>'Новости спорта'
            ],
            [
                'title'=>'Наука',
                'description'=>'Новости науки'
            ],
            [
                'title'=>'Культура',
                'description'=>'Новости культуры'
            ],
            [
                'title'=>'В мире',
                'description'=>'Новости мира'
            ]
        ];
        DB::table('categories')->insert($data);
    }
}
