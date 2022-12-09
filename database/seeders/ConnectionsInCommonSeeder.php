<?php

namespace Database\Seeders;

use App\Models\Connection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConnectionsInCommonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $connection = Connection::find(5);
        $connection->status = 'approve';
        $connection->save(); 


        $connection = Connection::find(6);
        $connection->status = 'approve';
        $connection->save(); 


        $connection = Connection::find(7);
        $connection->status = 'approve';
        $connection->save(); 


        $connection = Connection::find(8);
        $connection->status = 'approve';
        $connection->save(); 
    }
}
