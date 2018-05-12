<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateStudentDetail
 *
 * @package App\Http\Requests
 * @author Hafiz Suhaimi <pisyek@gmail.com>
 * @copyright 2018 Pisyek Studios
 */
class UpdateStudentDetail extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $today = now();
        $validCountry = implode(',', config('country'));

        return [
            'name' => 'required',
            'dob' => [
                'required',
                'date_format:Y-m-d',
                'before_or_equal:'. $today,
            ],
            'nationality' => [
                'required',
                'in:' . $validCountry,
            ],
            'phone' => [
                'required',
                'unique:students,phone,'.$this->input('id'),
            ],
        ];
    }
}
