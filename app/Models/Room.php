<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'hotel_id',
        'price',
        'capacity',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room()
    {
        return $this->hasMany(Invoice::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
