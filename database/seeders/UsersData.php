<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'username' => 'superior',
                'password' => bcrypt('superior'),
                'role' => 'superior',
            ],
        ];

        foreach($user as $key => $value ){
            User::create($value);
        }
    }
}
