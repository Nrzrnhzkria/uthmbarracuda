<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'name' => 'Admin',
                'email' => 'nrz.work@gmail.com',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]
        ];

        User::insert($admin);
    }
}
