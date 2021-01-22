<?php

namespace App\Http\Requests;

use Core\Dtos\User\User\User\User\Todo\CreateTodoDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateTodoRequest extends FormRequest
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
            'title'     => 'required',
            'desc' => 'required'
        ];
    }

    public function makeDTO():CreateTodoDto
    {
        return (new CreateTodoDto())
            ->setUserId($this->input('user_id'))
            ->setTitle($this->input('title'))
            ->setDesc($this->input('desc'))
            ->setIsComplete(false);
    }
}
