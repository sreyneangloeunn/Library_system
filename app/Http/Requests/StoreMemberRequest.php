<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
        return [
             'name'            => 'sometimes|required|string|max:255',
            'email'           => 'sometimes|required|email|unique:members,email,',
            'phone'           => 'sometimes|nullable|string|max:20',
            'role'            => 'sometimes|nullable|string|max:50',
            'membership_date' => 'sometimes|nullable|date',
        ];
    }
}
