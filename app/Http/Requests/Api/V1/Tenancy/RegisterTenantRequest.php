<?php

namespace App\Http\Requests\Api\V1\Tenancy;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterTenantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'owner_name' => ['required', 'string', 'max:255'],
            'owner_email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'business_name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'timezone' => ['nullable', 'string', 'timezone'],
            'currency' => ['nullable', 'string', 'size:3'],
            'plan' => ['nullable', 'string', 'exists:subscription_plans,slug'],
            'modules' => ['nullable', 'array'],
            'modules.*' => ['string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'owner_email.required' => 'Owner email is required.',
            'business_name.required' => 'Business name is required.',
            'password.confirmed' => 'Password confirmation does not match.',
        ];
    }
}
