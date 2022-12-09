<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "tayyab";
        $user->email = "tayyab@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 


        $user = new User;
        $user->name = "Asim";
        $user->email = "asim@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 



        $user = new User;
        $user->name = "Qasim";
        $user->email = "qasim@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 



        $user = new User;
        $user->name = "aqil";
        $user->email = "aqil@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 



        $user = new User;
        $user->name = "Faisal";
        $user->email = "faisal@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 


        $user = new User;
        $user->name = "Ali";
        $user->email = "ali@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 


        $user = new User;
        $user->name = "usman";
        $user->email = "usman@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 


        $user = new User;
        $user->name = "salam";
        $user->email = "salam@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 


        $user = new User;
        $user->name = "zain";
        $user->email = "zain@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 


        $user = new User;
        $user->name = "amir";
        $user->email = "amir@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 


        $user = new User;
        $user->name = "zmeer";
        $user->email = "zmeer@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 


        $user = new User;
        $user->name = "sami";
        $user->email = "sami@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 


        $user = new User;
        $user->name = "talha";
        $user->email = "talha@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 


        $user = new User;
        $user->name = "tariq";
        $user->email = "tariq@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 

        $user = new User;
        $user->name = "nabeel";
        $user->email = "nabeel@gmail.com";
        $user->password = bcrypt("Google@123"); 
        $user->save(); 
    }
}
