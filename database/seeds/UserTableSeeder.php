<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name="Tong Nguyen Khanh";
        $user->email="nguyenkhanheng@gmail.com";
        $user->password="124khanh";
        $user->save();

        $user = new User();
        $user->name="Dao Xuan Dat";
        $user->email="dxdat@gmail.com";
        $user->password="dat123";
        $user->save();

        $user = new User();
        $user->name="Nguyen Dang Huy";
        $user->email="huy@gmail.com";
        $user->password="huy111";
        $user->save();
    }
}
