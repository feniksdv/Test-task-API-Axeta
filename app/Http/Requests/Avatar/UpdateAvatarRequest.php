<?php

namespace App\Http\Requests\Avatar;

use App\Helpers\Responses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateAvatarRequest extends FormRequest
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
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
