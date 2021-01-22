<?php

namespace App\Http\Requests;

use Core\Dtos\User\User\User\User\Todo\UpdateTodoDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends FormRequest
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
            'id' => 'required',
            'user_id'       => 'required',
            'title'     => 'required',
            'desc' => 'required',
            'is_complete' => 'required'
        ];
    }

    public function makeDto(): UpdateTodoDto
    {
        return (new UpdateTodoDto())
            ->setId($this->input('id'))
            ->setUserId($this->input('user_id'))
            ->setTitle($this->input('title'))
            ->setDesc($this->input('desc'))
            ->setIsComplete($this->input('is_complete'));
    }
}
