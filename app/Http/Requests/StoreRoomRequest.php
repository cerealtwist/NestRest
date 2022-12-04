<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoomRequest extends FormRequest
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
        return [
            'number' => ['required'],
            'room_type' => ['required', Rule::in(['Single', 'Double', 'Triple', 'Quad'])],
            'hotel_id' => ['required'],
            'price' => ['required'],
            'status'=> ['required'],
        ];
    }
}
