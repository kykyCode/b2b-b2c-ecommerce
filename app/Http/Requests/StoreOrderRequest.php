<?php

namespace App\Http\Requests;

use App\Enums\PaymentType;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;


class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set to true if authorization is handled elsewhere
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'notes' => ['nullable', 'string'],
            'payment_method_key' => ['required', 'string', new Enum(PaymentType::class)],
            'shipping_method_key' => ['required', 'string'],
            'address' => ['required', 'array'],
            'address.address_line_1' => ['required', 'string', 'max:255'],
            'address.address_line_2' => ['nullable', 'string', 'max:255'],
            'address.first_name' => ['required', 'string', 'max:100'],
            'address.last_name' => ['required', 'string', 'max:100'],
            'address.phone_number' => ['nullable', 'string', 'max:15'],
            'address.zip' => ['required', 'string', 'max:20'],
            'address.country' => ['required', 'string', 'max:100'],
            'address.city' => ['required', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'payment_method_key.enum' => 'The selected payment method is invalid.',
        ];
    }
}
