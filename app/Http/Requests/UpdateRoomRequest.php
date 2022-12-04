<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoomRequest extends FormRequest
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
                'number' => ['required'],
                'hotel_id' => ['required'],
                'room_type' => ['required', Rule::in(['Single', 'Double', 'Triple', 'Quad'])],
                'price' => ['required'],
                'status'=> ['required'],
            ];
        } else {
            return [
                'number' => ['sometimes', 'required'],
                'hotel_id' => ['required'],
                'room_type' => ['sometimes', 'required', Rule::in(['Single', 'Double', 'Triple', 'Quad'])],
                'price'=> ['sometimes', 'required'],
                'status' => ['sometimes', 'required'],
            ];
        }
    }
}
