<?php


namespace Tests\Core\UseCases\User;


use Core\Dtos\User\User\User\User\CreateUserDto;
use Core\Exceptions\DuplicateException;
use Core\UseCases\User\CreateUserUseCase;
use Tests\Helper\UserTestHelper;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    /**
     * @var CreateUserUseCase
     */
    private $uc;

    /**
     * @var UserTestHelper
     */
    private $helper;

    protected function setUp(): void
    {
        parent::setUp();
        $this->uc     = app(CreateUserUseCase::class);
        $this->helper = app(UserTestHelper::class);
    }

    public function testCreate(): void
    {
        $dto = (new CreateUserDto())
            ->setName('test_user')
            ->setPassword('password');

        try {
            $output = $this->uc->execute($dto);
        } catch (DuplicateException $e) {
            self::assertTrue(false, 'returned failed use case');
            return;
        }

        $user = $output;
        self::assertEquals($dto->getName(), $user->getName());
        self::assertEquals($dto->getPassword(), $user->getPassword());
    }

    public function testAttemptCreateWithDuplicatedName(): void
    {
        $this->helper->createUser();

        $dto = (new CreateUserDto())
            ->setName('test_user')
            ->setPassword('password');

        try {
            $this->uc->execute($dto);
        } catch (DuplicateException $e) {
            self::assertTrue(true);
        }
    }
}
