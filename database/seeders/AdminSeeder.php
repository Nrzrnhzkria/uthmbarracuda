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
                'user_id' => 'ID001',
                'first_name' => 'Zarina',
                'last_name' => 'Zakaria',
                'email' => 'nrz.work@gmail.com',
                'password' => bcrypt('password'),
                'is_admin' => true,
                'is_active' => true,
                'is_highperformance' => true,
                'is_coach' => false
            ]
        ];

        User::insert($admin);
    }
}
