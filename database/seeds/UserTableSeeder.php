<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $user->job="student";
        $user->dob="2000-01-01";
        $user->phone="0363792188";
        $user->address="Hai Phong";
        $user->gender="Male";
        $user->description="Com chao gi tam nay";
        $user->password=Hash::make('password');
        $user->save();

        $user = new User();
        $user->name="Dao Xuan Dat";
        $user->email="dxdat@gmail.com";
        $user->job="teacher";
        $user->dob="2000-01-01";
        $user->phone="0363792189";
        $user->address="Hai Phong";
        $user->gender="Male";
        $user->description="Com chao gi tam nay";
        $user->password=Hash::make('password');
        $user->save();

        $user = new User();
        $user->name="Nguyen Dang Huy";
        $user->email="huy@gmail.com";
        $user->job="student";
        $user->dob="2000-01-01";
        $user->phone="0363792188";
        $user->address="Hai Phong";
        $user->gender="Name";
        $user->description="Com chao gi tam nay";
        $user->password=Hash::make('password');
        $user->save();
    }
}
