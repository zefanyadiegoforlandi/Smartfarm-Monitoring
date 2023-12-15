<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Sensor extends Model
{
    use HasFactory;
    protected $table = "sensor";
    protected $primaryKey = "id_sensor"; 
    protected $keyType = 'string';


    protected $fillable = [
        'id_sensor',
        'id_lahan',
        'tanggal_aktivasi',
        ];
    public function lahan() {
        return $this->belongsTo(Lahan::class, 'id_lahan');
    }    
}
