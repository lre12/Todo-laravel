<?php

namespace App\Http\Requests;

use Core\Dtos\User\User\UpdateUserDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'       => 'required',
            'name'     => 'required',
            'password' => 'required'
        ];
    }

    public function makeDto(): UpdateUserDto
    {
        return (new UpdateUserDto())
            ->setId($this->input('id'))
            ->setName($this->input('name'))
            ->setPassword($this->input('password'));
    }
}
