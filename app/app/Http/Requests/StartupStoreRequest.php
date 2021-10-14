<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StartupStoreRequest extends FormRequest
{
    
    public function rules() : array
    {
        return [
            'name'            => 'required|string|unique:startups',
            'userId'          => 'required|numeric',
            'kindStartupId' => 'required|numeric',
            'img' => 'nullable'
        ];
    }




    /*protected function failedValidation(Validator $validator)
{
    $errors = $validator->errors();

    $response = response()->json([
        'message' => 'Invalid data send',
        'details' => $errors->messages(),
    ], 422);

    throw new HttpResponseException($response);
}*/


}