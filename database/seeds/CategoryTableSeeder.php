<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = "mon chay";
        $category->image = "image1";
        $category->save();

        $category = new Category();
        $category->name = "mon man";
        $category->image = "image2";
        $category->save();

        $category = new Category();
        $category->name = "mon ngot";
        $category->image = "image3";
        $category->save();
    }
}
