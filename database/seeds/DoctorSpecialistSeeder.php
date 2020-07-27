<?php

use App\Models\DoctorSpecialist;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DoctorSpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $doctorSpecialist = [
            [
                'specialist' => 'Neurologist',
                'details' => '',
                'created_at' => $now,
            ],
            [
                'specialist' => 'Rheumatologist',
                'details' => '',
                'created_at' => $now,
            ]
        ];
        DoctorSpecialist::insert($doctorSpecialist);
    }
}
