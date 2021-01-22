<?php


namespace Core\Repositories;


use App\Models\Eloquent\User;
use Core\Dtos\User\User\UpdateUserDto;
use Core\Dtos\User\User\User\DeleteUserDto;
use Core\Entities\User as UserEntity;
use Core\Exceptions\DuplicateException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class UserRepository
{
    /**
     * @param string $name
     * @param string $password
     *
     * @return UserEntity
     * @throws DuplicateException
     */
    public function createUser(string $name, string $password): UserEntity
    {
        $user           = new User();
        $user->name     = $name;
        $user->password = $password;

        try {
            $user->save();
        } catch (QueryException $exception) {
            error_log($exception->getMessage());
            throw new DuplicateException();
        }

        return $user->toEntity();
    }

    public function hasName(string $name): bool
    {
        return User::query()->where('name', $name)->exists();
    }

    public function updateUser(UpdateUserDto $dto): ?UserEntity
    {
        try {
            $user = User::query()->findOrFail($dto->getId());
        } catch (ModelNotFoundException $exception) {
            return null;
        }

        $user->name = $dto->getName() ?? $user->name; #null coalescing operator
        $user->save();

        return $user->toEntity();
    }

    public function loginUser(string $name, string $password): ?UserEntity
    {
        try {
            return User::query()
                ->where('name', $name)
                ->where('password', $password)
                ->firstOrFail()
                ->toEntity();
        } catch (ModelNotFoundException $exception) {
            return null;
        }
    }

    public function deleteUser(DeleteUserDto $dto): bool
    {
        try {
            optional(User::query()->findOrFail($dto->getId()))->delete();
        } catch (ModelNotFoundException | \Exception $e) {
            return false;
        }
        return true;
    }

    # 의문점.. DTO는 레포지토리까지 와도 되는것인가..?

}
