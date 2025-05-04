<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $contactId = $this->route('contact')?->id;
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'phone'      => [
                'required',
                'string',
                'max:20',
                Rule::unique('contacts')->ignore($contactId)->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
            'email'      => [
                'nullable',
                'email',
                Rule::unique('contacts')->ignore($contactId)->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
            'address'    => 'nullable|string',
            'notes'      => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'last_name.required'  => 'Last name is required.',
            'phone.required'      => 'Phone number is required.',
            'phone.unique'        => 'This phone number is already used.',
            'phone.max'           => 'Phone number must not exceed 20 characters.',
            'email.email'         => 'Please provide a valid email address.',
            'email.unique'        => 'This email address is already used.',
        ];
    }
}
