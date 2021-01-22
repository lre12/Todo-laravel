<?php

namespace App\Http\Requests;

use Core\Dtos\User\User\User\User\Todo\DeleteTodoDto;
use Illuminate\Foundation\Http\FormRequest;

class DeleteTodoRequest extends FormRequest
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
            'user_id'       => 'required',
            'id'     => 'required'
        ];
    }

    public function makeDTO(): DeleteTodoDto
    {
        return (new DeleteTodoDto())
            ->setId($this->input('id'))
            ->setUserId($this->input('user_id'));
    }
}
