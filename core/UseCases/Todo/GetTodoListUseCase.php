<?php


namespace Core\UseCases\Todo;


use Core\Repositories\TodoRepository;

class GetTodoListUseCase
{
    private $repository;

    public function __construct(TodoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $userID):array
    {
        return $this->repository->getTodoList($userID);
    }
}
