<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataSensor;

class DataSensorSeeder extends Seeder
{
    public function run()
    {
        // Menggunakan model factory untuk membuat 50 data dummy
        DataSensor::factory()->count(50)->create();
    }
}
