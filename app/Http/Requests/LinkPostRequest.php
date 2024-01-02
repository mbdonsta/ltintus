<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkPostRequest extends FormRequest
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
            'destination_url' => 'required|url|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'destination_url.required' => __('Destination URL is required.'),
            'destination_url.url' => __('Destination URL must be a valid url address.'),
            'destination_url.max' => __('Destination URL can not be more than 255 symbols.'),
        ];
    }
}
