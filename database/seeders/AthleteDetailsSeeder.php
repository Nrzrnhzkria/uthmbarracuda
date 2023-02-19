<?php

namespace Database\Seeders;

use App\Models\AthleteDetails;
use Illuminate\Database\Seeder;

class AthleteDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $athlete_details = [
            [
                'matric_no' => 'GI210008',
                'ic_no' => '961104015008',
                'phone_no' => '60102693426',
                'gender' => 'Women',
                'faculty' => 'FSKTM',
                'weight' => '58',
                'height' => '162',
                'experience' => 'International',
                'aspirations' => 'GOAT',
                'user_id' => '1',
            ]
        ];

        AthleteDetails::insert($athlete_details);
    }
}
