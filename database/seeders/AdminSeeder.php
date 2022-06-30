<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::where('email', 'superadmin@example.com')->first();

        if(is_null($admin)){
            $admin = new Admin();
            $admin->name = "Super Admin";
            $admin->email = "superadmin@example.com";
            $admin->phone_number = "01729673492";
            $admin->address = "Mirpur, Dhaka, Bangladesh";
            $admin->password = Hash::make("superadmin123");
            $admin->status = '1';
            $admin->save();
        }
    }
}
