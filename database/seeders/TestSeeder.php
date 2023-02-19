<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = [
            [
                'test_id' => 'T001',
                'title' => '2000 m',
                'date' => '19/02/2023',
                'link' => 'http://127.0.0.1:8000/test-form/T001'
            ]
        ];

        Test::insert($test);
    }
}
