<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'customer_id' => $this->customer_id,
            'hotel_id' => $this->hotel_id,
            'room_id' => $this->room_id,
            'bookedDate' => $this->booked_date,
            'checkIn' => $this->check_in,
            'checkOut' => $this->check_out,
        ];
    }
}
