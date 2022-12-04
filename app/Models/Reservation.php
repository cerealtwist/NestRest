<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'hotel_id',
        'room_id',
        'booked_date',
        'check_in',
        'check_out',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
