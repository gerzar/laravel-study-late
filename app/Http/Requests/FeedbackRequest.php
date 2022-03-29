<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'title' => 'required|max:255',
            'message' => 'required|max:1000',
            'email' => 'required|email',
            'username' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A Subject is required',
            'message.required' => 'A message is required',
            'email.required' => 'An email is required',
            'username.required' => 'An username is required',

            'title.max' => 'A Subject should be less then 255 symbols',
            'message.max' => 'A message should be less then 1000 symbols',
            'email.email' => 'E-mail is not correct',
            'username.max' => 'A User Name should be less then 255 symbols',
        ];
    }

}
