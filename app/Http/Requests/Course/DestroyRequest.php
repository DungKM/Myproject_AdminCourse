<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Constraint\Count;

class DestroyRequest extends FormRequest
{
    /**
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
    public function rules()
    {
       
        return [
            'course'=>[
                'required',
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(input: ['course' => $this->route(param: 'course')]);
    }
}
