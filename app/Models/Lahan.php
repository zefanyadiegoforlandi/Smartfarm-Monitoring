<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    use HasFactory;

    protected $table = "lahan";
    protected $primaryKey = "id_lahan";
    protected $keyType = 'string';


    protected $fillable = [
        'id_lahan',
        'alamat_lahan',
        'luas_lahan',
        'id_user',
    ];

    public function sensor()
    {
        return $this->hasMany(Sensor::class, 'id_lahan', 'id_lahan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
