<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $users = [ 
            [ 
              'id' => '1',
              'name' => 'Admin',
              'email' => 'admin@gmail.com',
              'password' => '123456',
              'tgl_lahir' => '2000-10-12',
              'role' => '1',
            ],
            [
              'id' => '2',
              'name' => 'User',
              'email' => 'user@gmail.com',
              'password' => '123456',
              'tgl_lahir' => '2001-10-12',
              'role' => null,
            ],
             [
              'id' => '3',
              'name' => 'Client',
              'email' => 'client@gmail.com',
              'password' => '123456',
              'tgl_lahir' => '2002-10-12',
              'role' => null,
            ] 
          ];

          foreach($users as $user)
          {
              User::create([
               'name' => $user['name'],
               'email' => $user['email'],
               'tgl_lahir' => $user['tgl_lahir'],
               'password' => Hash::make($user['password'])
             ]);
           }
    }
}
