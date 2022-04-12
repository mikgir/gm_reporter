<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['category_id' => "string[]", 'title' => "string[]",
        'image' => "string[]", 'author' => "string[]", 'status' => "string[]",
        'description' => "string[]"])]
    public function rules(): array
    {
        return [
            'category_id' =>['required', 'integer', 'exists:news'],
            'title'=>['required', 'string'],
            'image'=>['nullable', 'string'],
            'author'=>['required', 'string'],
            'status'=>['required', 'string', 'min:5', 'max:7'],
            'description'=>['required', 'string']
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return parent::messages();
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return parent::attributes();
    }
}
