<?php


namespace Core\UseCases\Todo;


use Core\Dtos\User\User\User\User\Todo\CreateTodoDto;
use Core\Entities\Todo;
use Core\Exceptions\DuplicateException;
use Core\Repositories\TodoRepository;

class CreateTodoUseCase
{
    private $repository;

    public function __construct(TodoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param CreateTodoDto $dto
     *
     * @return Todo
     * @throws DuplicateException
     */

    public function execute(CreateTodoDto $dto): Todo
    {
        if($this->repository->hasTitle($dto->getTitle())){
            throw new DuplicateException();
        }
        try{
            $todo = $this->repository->createTodo($dto->getUserId(),$dto->getTitle(),$dto->getDesc());
        }catch (DuplicateException $exception){
            throw new DuplicateException();
        }
        return $todo;
    }


}
