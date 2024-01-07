<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSensor extends Model
{
    use HasFactory;

    protected $table = 'data_sensor';

    protected $fillable = [
        'id_sensor',
        'intensitas_cahaya',
        'kelembaban_tanah',
        'kualitas_udara',
        'curah_hujan',
        'kelembaban_udara',
        'suhu',
        'tekanan',
        'ketinggian',
        'waktu_perekaman',
    ];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class, 'id_sensor');
    }
}
