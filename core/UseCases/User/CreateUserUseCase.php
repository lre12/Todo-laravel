<?php

namespace Core\UseCases\User;

use Core\Dtos\User\User\User\User\CreateUserDto;
use Core\Entities\User;
use Core\Exceptions\DuplicateException;
use Core\Repositories\UserRepository;

class CreateUserUseCase
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
     */

    public function execute(CreateUserDto $dto): User
    {
        if ($this->repository->hasName($dto->getName())) {
            throw new DuplicateException();
        }

        try {
            $user = $this->repository->createUser($dto->getName(), $dto->getPassword());
        } catch (DuplicateException $exception) {
            throw new DuplicateException();
        }

        return $user;
    }
}
