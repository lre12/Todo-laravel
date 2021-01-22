<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Responses\ExceptionResponse;
use Core\Exceptions\DuplicateException;
use Core\Exceptions\NotFoundException;
use Core\UseCases\User\CreateUserUseCase;
use Core\UseCases\User\DeleteUserUseCase;
use Core\UseCases\User\LoginUseCase;
use Core\UseCases\User\UpdateUserUseCase;

class UserController extends Controller
{
    public function store(CreateUserRequest $request, CreateUserUseCase $useCase): \Illuminate\Http\JsonResponse
    {
        try{
            $dto = $request->makeDto();
            $result = $useCase->execute($dto);
        }catch (DuplicateException $e){
            return ExceptionResponse::build($e);
        }
        return response()->json($result);
    }

    public function login(LoginRequest $request, LoginUseCase $useCase): \Illuminate\Http\JsonResponse
    {
        $dto = $request->makeDto();
        try{
            $result = $useCase->execute($dto);
        }catch (NotFoundException $e){
            return ExceptionResponse::build($e);
        }
        return response()->json($result);
    }
    #TODO 로그인 대신 sessionController 만들어서 store로 바꾸기.

    public function edit(UpdateUserRequest $request, UpdateUserUseCase $useCase)
    {
        $dto = $request->makeDto();
        try{
            $result = $useCase->execute($dto);
        }catch (NotFoundException $e){
            return ExceptionResponse::build($e);
        }
        return response()->json($result);
    }

    public function destroy(DeleteUserRequest $request, DeleteUserUseCase $useCase): \Illuminate\Http\JsonResponse # 너무흉물스럽다.
    {
        $dto = $request->makeDto();
        $result = $useCase->execute($dto);
        return response()->json(["result"=>$result]);
    }
}
