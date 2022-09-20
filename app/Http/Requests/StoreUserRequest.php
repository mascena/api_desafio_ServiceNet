<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreUserRequest extends FormRequest
{

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'validate' => true ,'msg' => $validator->getMessageBag()
        ], 200));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'birthday' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|regex:/[0-9]/|regex:/[a-z]/|regex:/[@$!%*#?&]/',
        ];
    }
}
