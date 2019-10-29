<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag();
        $tag->name = "Mon Viet";
        $tag->slug = Str::slug('Mon Viet');
        $tag->save();
        $tag = new Tag();
        $tag->name = "Mon Nhat";
        $tag->slug = Str::slug('Mon Nhat');
        $tag->save();
        $tag = new Tag();
        $tag->name = "Mon My";
        $tag->slug = Str::slug('Mon My');
        $tag->save();
    }
}
