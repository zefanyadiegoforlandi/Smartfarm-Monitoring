<?php

namespace Database\Factories;

use App\Models\DataSensor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataSensorFactory extends Factory
{
    protected $model = DataSensor::class;

    public function definition()
    {
        // Mengganti waktu_perekaman dengan waktu yang disediakan
        $start_time = strtotime('2023-09-19 00:00:00');
        $interval = 300; // 5 menit dalam detik
        $timestamp = $start_time + ($this->faker->unique()->numberBetween(1, 50) * $interval);
        $waktu_perekaman = date('Y-m-d H:i:s', $timestamp);
        
        return [
            'id_sensor' => 'S008',
            'intensitas_cahaya' => $this->faker->randomNumber(3),
            'kelembaban_tanah' => $this->faker->numberBetween(40, 80),
            'kualitas_udara' => $this->faker->numberBetween(1, 3),
            'curah_hujan' => $this->faker->numberBetween(5, 20),
            'kelembaban_udara' => $this->faker->numberBetween(60, 90),
            'suhu' => $this->faker->numberBetween(20, 30),
            'tekanan' => $this->faker->numberBetween(1010, 1020),
            'ketinggian' => $this->faker->numberBetween(50, 200),
            'waktu_perekaman' => $waktu_perekaman,
        ];
    }
}
