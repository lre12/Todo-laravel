<?php


namespace Tests\Core\UseCases\Todo;


use Core\Dtos\User\User\User\User\Todo\CreateTodoDto;
use Core\UseCases\Todo\CreateTodoUseCase;
use Tests\Helper\UserTestHelper;
use Tests\TestCase;

class CreateTodoTest extends TestCase
{

    /**
     * @var CreateTodoUseCase
     */
    private $uc;

    /**
     * @var UserTestHelper
     */
    private $helper;

    protected function setUp(): void
    {
        parent::setUp();
        $this->uc     = app(CreateTodoUseCase::class);
        $this->helper = app(UserTestHelper::class);
    }

    public function testCreateTask(): void
    {
        $user = $this->helper->createUser();

        $name = 'todo name';
        $desc = 'desc';

        $dto = (new CreateTodoDto())
            ->setUserId($user->getId())
            ->setTitle($name)
            ->setDesc($desc);

        $task = $this->uc->execute($dto);

        self::assertEquals($name, $task->getTitle());
        self::assertEquals($desc, $task->getDesc());
        self::assertEquals($user->getId(), $task->getUserId());
    }
}
