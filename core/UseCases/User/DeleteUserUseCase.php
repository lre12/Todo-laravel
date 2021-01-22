<?php


namespace Core\UseCases\User;


use Core\Dtos\User\User\User\DeleteUserDto;
use Core\Repositories\UserRepository;

class DeleteUserUseCase
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(DeleteUserDto $dto): bool
    {

        return $this->repository->deleteUser($dto);
    }
}
