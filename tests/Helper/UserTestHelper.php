<?php


namespace Tests\Helper;

use Core\Dtos\User\User\User\User\CreateUserDto;
use Core\Entities\User;
use Core\Repositories\UserRepository;
use Core\UseCases\User\CreateUserUseCase;
use Core\UseCases\User\LoginUseCase;

class UserTestHelper
{
    /**
     * @var CreateUserUseCase
     */
    private $createUserUc;
    /**
     * @var LoginUseCase
     */
    private $loginUc;
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserTestHelper constructor.
     *
     * @param CreateUserUseCase $createUserUc
     * @param LoginUseCase $loginUc
     * @param UserRepository $userRepository
     */
    public function __construct(
        CreateUserUseCase $createUserUc,
        LoginUseCase $loginUc,
        UserRepository $userRepository
    ) {
        $this->createUserUc   = $createUserUc;
        $this->loginUc        = $loginUc;
        $this->userRepository = $userRepository;
    }


    public function createUser($name = 'test_user', $password = 'password'): User
    {
        $dto = (new CreateUserDto())
            ->setName($name)
            ->setPassword($password);

        /** @noinspection PhpUnhandledExceptionInspection */
        return $this->createUserUc->execute($dto);
    }
}
