<?php


namespace Core\UseCases\User;


use Core\Dtos\User\User\UpdateUserDto;
use Core\Entities\User;
use Core\Exceptions\NotFoundException;
use Core\Repositories\UserRepository;

class UpdateUserUseCase
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(UpdateUserDto $dto):User
    {
        $user = $this->repository->updateUser($dto);

        if($user == null){
            throw new NotFoundException('not found user');
        }

        return $user;
    }

}
