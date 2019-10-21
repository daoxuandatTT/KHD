<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CommentTableSeeder::class);
<<<<<<< HEAD
=======
        $this->call(AdminTableSeeder::class);
>>>>>>> 53a268adaf8ff68145724f4a7fe7123294005106
    }
}
