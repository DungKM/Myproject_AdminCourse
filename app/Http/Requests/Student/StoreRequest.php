<?php

namespace App\Http\Requests\Student;

use App\Enums\StudentStatusEnum;
use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'name'=>[
                'required',
                'string',
                'min:2',
                'max:50'
            ],
            'gender'=>[
                'required',
                'boolean'
            ],
            'birthdate'=>[
                'required',
                'date',
                'before:today'
            ],
            'status' =>[
                'required',
                Rule::in(values: StudentStatusEnum::asArray())
            ],
            'avatar' =>[
                'nullable',
                'file',
                'image'
            ],
            'course_id'=>[
                'required',
                Rule::exists(Course::class,'id')
            ]
        ];
    }
}