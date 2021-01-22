<?php

namespace App\Http\Requests;

use Core\Dtos\User\User\User\DeleteUserDto;
use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
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
            'id'       => 'required',
            'name'     => 'required',
            'password' => 'required'
        ];
    }

    public function makeDto(): DeleteUserDto
    {
        return (new DeleteUserDto())
            ->setId($this->input('id'))
            ->setName($this->input('name'))
            ->setPassword($this->input('password'));
    }
}
