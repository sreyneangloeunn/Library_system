<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoansRequest extends FormRequest
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
            'member_id'    => 'required|exists:members,id',
            'book_id'      => 'required|exists:books,id',
            'loan_date'    => 'required|date',
            'due_date'     => 'required|date|after_or_equal:loan_date',
            'return_date'  => 'nullable|date|after_or_equal:loan_date',
            'status'       => 'required|in:borrowed,returned,overdue',
        ];
    }
}
