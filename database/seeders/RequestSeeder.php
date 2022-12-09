<?php

namespace Database\Seeders;

use App\Models\Connection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $connection = new Connection;
        $connection->requested_from = 1;
        $connection->requested_to = 2;
        $connection->status = 'pending';
        $connection->save(); 


        $connection = new Connection;
        $connection->requested_from = 1;
        $connection->requested_to = 3;
        $connection->status = 'pending';
        $connection->save(); 



        $connection = new Connection;
        $connection->requested_from = 1;
        $connection->requested_to = 4;
        $connection->status = 'pending';
        $connection->save(); 



        $connection = new Connection;
        $connection->requested_from = 1;
        $connection->requested_to = 5;
        $connection->status = 'pending';
        $connection->save(); 



        $connection = new Connection;
        $connection->requested_from = 1;
        $connection->requested_to = 6;
        $connection->status = 'pending';
        $connection->save(); 



        $connection = new Connection;
        $connection->requested_from = 1;
        $connection->requested_to = 7;
        $connection->status = 'pending';
        $connection->save(); 


        $connection = new Connection;
        $connection->requested_from = 1;
        $connection->requested_to = 8;
        $connection->status = 'pending';
        $connection->save(); 



        $connection = new Connection;
        $connection->requested_from = 1;
        $connection->requested_to = 9;
        $connection->status = 'pending';
        $connection->save(); 
    }
}
