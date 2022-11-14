<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $categories = [
            [
                'name' => 'Personal',
                'slug' => 'personal'
            ],
            [
                'name' => 'Work',
                'slug' => 'work'
            ],
            [
                'name' => 'Hobby',
                'slug' => 'hobby'
            ]
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();

        foreach ($categories as $category) {
            Category::create($category);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
