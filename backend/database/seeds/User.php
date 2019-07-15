<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User as UserModel;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userModel = new UserModel;

        $userModel->name = "Test";
        $userModel->email = "test@test.com";
        $userModel->password = Hash::make("prueba");
        $userModel->api_token = Str::random(60);//hash('sha256', "prueba");
        $userModel->save();

    }
}
