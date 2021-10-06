<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'min:3', 'max:100'],
            'userfeedback' => ['required', 'string', 'min:3'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute нужно заполнить!'
        ];
    }

    public function attributes(): array
    {
        return  [
            'username' => 'имя',
            'userfeedback' => 'отзыв'
        ];
    }
}
