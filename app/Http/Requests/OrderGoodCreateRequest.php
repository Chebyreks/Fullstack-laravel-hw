<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderGoodCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'price'=> ['required', 'integer'],
            'good_id'=> ['required', 'string', 'exists:good,id'],
            'order_id'=> ['required', 'string', 'exists:order,id'],
        ];
    }
}
