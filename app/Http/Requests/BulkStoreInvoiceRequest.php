<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkStoreInvoiceRequest extends FormRequest
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
            '*.customerId' => ['required', 'foreignId'],
            '*.roomId' => ['required', 'foreignId'],
            'price' => ['required', 'numeric'],
            'status'=> ['required', Rule::in(['Booked', 'Paid', 'booked', 'paid'])],
            'booked_date' => ['required', 'date_format:Y-m-d H:i:s'],
            'paid_date' => ['nullable', 'date_format:Y-m-d H:i:s'],
        ];
    }

    protected function prepareForValidation()
    {
        $data = [];

        foreach($this->toArray() as $obj) {
            $obj['customer_id'] = $obj['customer_id'] ?? null;
            $obj['room_id'] = $obj['customer_id'] ?? null;
            $obj['booked_date'] = $obj['booked_date'] ?? null;
            $obj['paid_date'] = $obj['paid_date'] ?? null;

            $data[] = $obj;
        }
        $this->merge($data);
    }
}
