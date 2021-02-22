<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //$user=User::where('email','ahmed-habeeb@outlook.com')->first();
       $user=DB::table('users')->where('email','ahmed-habeeb@outlokk.com')->first();
        if(!$user)
        {
            User::create([
                'name'=>'Ahmed Habeeb',
                'email'=>'ahmed-habeeb@outlook.com',
                'companyName'=>'Dundung',
                'role'=>'admin',
                'password'=>Hash::make('30.12.1988Ahmed')
            ]);
        }
    }
}
