<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       //  \App\Models\User::factory(10)->create(); 
       $data=[
            'username' =>'Krishna',
            'email' =>'krishna@gmail.com',
            'password' =>'1234',
            'address' =>'sdfghjk',
            'contact' =>'456789',
            'role'=>'admin',
            //'created_at'=>Carbon::now(),
            'status'=>1

        ];
        
        //User::create($data);

             DB::table('users')->insert([
            'username' => 'Megha S Sasidharan',
            'email' => 'megha@gmail.com',
            'password' => bcrypt('12345'),
            'address'=>'qwertyuio',
            'contact'=> '111',
            'role'=>'admin',
           // 'email_verified_at'=>'1',
            'status'=>'1'
            
        ]);
 

    }
}
