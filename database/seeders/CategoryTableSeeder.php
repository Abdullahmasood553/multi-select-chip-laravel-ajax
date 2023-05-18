<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run()
    {
        Category::create(['title' => "Laravel"]);
        Category::create(['title' => "Programming"]);
        Category::create(['title' => "PHP"]);
        Category::create(['title' => "Python"]);
        Category::create(['title' => "Java"]);
        Category::create(['title' => "HTML"]);
    }
}
