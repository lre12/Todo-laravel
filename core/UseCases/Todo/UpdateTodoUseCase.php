<?php


namespace Core\UseCases\Todo;


use Core\Dtos\User\User\User\User\Todo\UpdateTodoDto;
use Core\Entities\Todo;
use Core\Exceptions\NotFoundException;
use Core\Repositories\TodoRepository;

class UpdateTodoUseCase
{
    private $repository;

    public function __construct(TodoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param UpdateTodoDto $dto
     *
     * @return Todo
     * @throws NotFoundException
     */

    public function execute(UpdateTodoDto $dto): Todo
    {
        $user = $this->repository->updateTodo($dto);
        if($user==null){
            throw new NotFoundException('not found todo');
        }
        return $user;
    }
}
