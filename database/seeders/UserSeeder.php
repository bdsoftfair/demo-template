<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'md.rabbi.web@gmail.com')->first();

        if(is_null($user)){
            $user = new User();
            $user->name = "Md. Rabbi";
            $user->email = "md.rabbi.web@gmail.com";
            $user->phone_number = "01729673492";
            $user->address = "Mirpur, Dhaka, Bangladesh";
            $user->password = Hash::make("rabbi204");
            $user->save();
        }
        
    }
}
