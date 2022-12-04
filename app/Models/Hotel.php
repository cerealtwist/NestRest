<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'image',
        'description'
    ];

    public function room() {
        return $this->hasMany(Room::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
