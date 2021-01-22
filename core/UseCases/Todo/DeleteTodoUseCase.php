<?php


namespace Core\UseCases\Todo;


use Core\Dtos\User\User\User\User\Todo\DeleteTodoDto;
use Core\Repositories\TodoRepository;

class DeleteTodoUseCase
{
    private $repository;

    public function __construct(TodoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param DeleteTodoDto $dto
     *
     * @return bool
     */

    public function execute(DeleteTodoDto $dto): bool
    {
        return $this->repository->deleteTodo($dto);
    }
}
