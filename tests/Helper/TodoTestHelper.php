<?php


namespace Tests\Helper;


use Core\Dtos\User\User\User\User\Todo\CreateTodoDto;
use Core\Entities\Todo;
use Core\UseCases\Todo\CreateTodoUseCase;

class TodoTestHelper
{
    /**
     * @var CreateTodoUseCase
     */
    private $createTaskUseCase;

    public function __construct(
        CreateTodoUseCase $createTaskUseCase
    ) {
        $this->createTaskUseCase = $createTaskUseCase;
    }

    public function createTodo($userId, $name = 'task name', $desc = 'task desc'): Todo
    {
        $dto = (new CreateTodoDto())
            ->setUserId($userId)
            ->setName($name)
            ->setDesc($desc);

        return $this->createTaskUseCase->execute($dto);
    }
}
