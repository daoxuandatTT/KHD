<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = "nguyenkhanh1412";
        $admin->email = "nguyenkhanh1412@gmail.com";
        $admin->password = "nguyenkhanh1412";
        $admin->save();
    }
}
