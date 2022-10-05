<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'id_card' => 'required|string',
            'gender' => 'in:male,female',
            'name' => 'required|string',
            'surname' => 'required|string',
            'date_of_birth' => 'required|string',
            'address' => 'required|string',
            'post_code' => 'required|string',
            'contact_number_1' => 'required|string',
            'contact_number_2' => 'required|string'
        ];
    }
}
