<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->method();

        if($method == 'PUT') {
            return [
                'customer_id' => ['required'],
                'hotel_id' => ['required'],
                'room_id' => ['required'],
                'booked_date' => ['required', 'date_format:Y-m-d H:i:s'],
                'check_in' => ['required', 'date_format:Y-m-d H:i:s'],
                'check_out' => ['required', 'date_format:Y-m-d H:i:s'],
            ];
        } else {
            return [
                'customer_id' => ['required'],
                'hotel_id' => ['required'],
                'room_id' => ['required'],
                'booked_date' => ['sometimes', 'required', 'date_format:Y-m-d H:i:s'],
                'check_in' => ['sometimes', 'required', 'date_format:Y-m-d H:i:s'],
                'check_out' => ['sometimes', 'required', 'date_format:Y-m-d H:i:s'],
            ];
        }
    }
}
