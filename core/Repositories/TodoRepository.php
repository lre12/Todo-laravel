<?php


namespace Core\Repositories;


use App\Models\Eloquent\Todo;
use Core\Dtos\User\User\User\User\Todo\DeleteTodoDto;
use Core\Dtos\User\User\User\User\Todo\UpdateTodoDto;
use Core\Entities\Todo as TodoEntity;
use Core\Exceptions\DuplicateException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class TodoRepository
{
    public function createTodo(int $user_id,string $title, string $desc): TodoEntity
    {
        $todo           = new Todo();
        $todo->user_id = $user_id;
        $todo->title = $title;
        $todo->desc = $desc;
        $todo->is_complete = false;

        try {
            $todo->save();
        } catch (QueryException $exception) {
            error_log($exception->getMessage());
            throw new DuplicateException();
        }

        return $todo->toEntity();
    }

    public function hasTitle(string $title): bool
    {
        return Todo::query()->where('title', $title)->exists();
    }


    public function updateTodo(UpdateTodoDto $dto): ?TodoEntity
    {
        try {
            $todo = Todo::query()->findOrFail($dto->getId());
        } catch (ModelNotFoundException $exception) {
            return null;
        }

        $todo->title = $dto->getTitle()?? $todo->title; #null coalescing operator
        $todo->save();

        return $todo->toEntity();
    }

    public function deleteTodo(DeleteTodoDto $dto): bool
    {
        try {
            optional(Todo::query()->findOrFail($dto->getId()))->delete();
        } catch (ModelNotFoundException | \Exception $e) {
            return false;
        }
        return true;
    }

    public function getTodoList(int $userID)
    {
        return Todo::query()
            ->where('user_id', $userID)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(static function (Todo $todo) {
                return $todo->toEntity();
            })
            ->toArray();
    }

}
