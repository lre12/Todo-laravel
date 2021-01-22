<?php


namespace Core\UseCases\User;


use Core\Dtos\User\LoginDto;
use Core\Entities\User;
use Core\Exceptions\DuplicateException;
use Core\Exceptions\NotFoundException;
use Core\Repositories\UserRepository;

class LoginUseCase
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param CreateUserDto $dto
     *
     * @return User
     * @throws DuplicateException
     * @throws NotFoundException
     */

    public function execute(LoginDto $dto): User
    {
        $user = $this->repository->loginUser($dto->getIdentification(), $dto->getPassword());
        if($user == null)
        {
            throw new NotFoundException("not found user");
        }
        return $user;
    }
}
