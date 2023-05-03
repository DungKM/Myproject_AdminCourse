<?php

namespace App\Http\Requests\Course;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() :array
    {
        
        return [
            'name' =>[
                'bail',
                'required',
                'string',
                Rule::unique(table:'courses')->ignore(id: $this->course),
            ],
        ];
    }

    public function messages(): array
    {
        return [
          'required'=>':attribute Bắt buộc phải điền',
        ];
    }
    public function attributes() : array
    {
        return [
            'name'=>'Name',
          ];
    }
}
