<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StartCrawlRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return response()->json($validator->messages(), 400);
    }
}
