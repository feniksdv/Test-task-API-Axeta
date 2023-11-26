<?php

namespace App\Http\Requests\Experience;

use App\Helpers\Responses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class AddRequest extends FormRequest
{
    use Responses;

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'value' => 'required|string|max:100',
        ];
    }

    /**
     * Configure the validator exceptions.
     *
     * @param Validator $validator
     *
     * @return void
     */
    public function withValidator(Validator $validator): void
    {
        if ($validator->fails()) {
            $this->exceptionResponse($validator->errors()->first(), 400);
        }
    }
}
