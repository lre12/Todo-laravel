<?php

namespace App\Http\Requests;

use Core\Dtos\User\LoginDto;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        return [
            'name'     => 'required',
            'password' => 'required'
        ];
    }

    public function makeDto(): LoginDto
    {
        return (new LoginDto())
            ->setIdentification($this->input('name'))
            ->setPassword($this->input('password'));
    }
}