<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreHotelRequest extends FormRequest
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
        if(request()->isMethod('post')) {
            return [
                'name' => 'required|string|max:258',
                'address' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required',
            ];
        } else {
            return [
                'name' => 'required|string|max:258',
                'address' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required',
            ];
        }
    }
    public function messages()
    {
        if(request()->isMethod('post')) {
            return [
                'name.required' => 'Name is required!',
                'address.required' => 'Address is required!',
                'image.required' => 'Image is required!',
                'description.required' => 'Desc is required!'
            ];
        } else {
            return [
                'name.required' => 'Name is required!',
                'address.required' => 'Address is required!'
            ];   
        }
    }
}
