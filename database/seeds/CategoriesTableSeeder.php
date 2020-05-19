<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 12)->create()->each(
            function ($category) {
                $category->products()->saveMany(factory(\App\Product::class, 5)->make());
            }
        );
    }
}
