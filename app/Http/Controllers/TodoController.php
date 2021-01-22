<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\DeleteTodoRequest;
use App\Http\Requests\GetTodoListRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Responses\ExceptionResponse;
use Core\Exceptions\DuplicateException;
use Core\Exceptions\NotFoundException;
use Core\UseCases\Todo\CreateTodoUseCase;
use Core\UseCases\Todo\DeleteTodoUseCase;
use Core\UseCases\Todo\GetTodoListUseCase;
use Core\UseCases\Todo\UpdateTodoUseCase;

class TodoController extends Controller
{
    public function store(CreateTodoRequest $request,CreateTodoUseCase $useCase)
    {
        $dto = $request->makeDTO();
        try{
            $result = $useCase->execute($dto);
        }catch(DuplicateException $e){
            return ExceptionResponse::build($e);
        }
        return response()->json($result);
    }


    public function edit(UpdateTodoRequest $request, UpdateTodoUseCase $useCase)
    {
        $dto = $request->makeDto();
        try{
            $result = $useCase->execute($dto);
        }catch (NotFoundException $e){
            return ExceptionResponse::build($e);
        }
        return response()->json($result);
    }

    public function destroy(DeleteTodoRequest $request, DeleteTodoUseCase $useCase)
    {
        $dto = $request->makeDTO();
        try{
            $result = $useCase->execute($dto);
        }catch (NotFoundException $e){
            return ExceptionResponse::build($e);
        }
        return response()->json($result);
    }

    public function show(GetTodoListRequest $request, GetTodoListUseCase $useCase)
    {
        $userID = $request->input('user_id');
        try{
            $result = $useCase->execute($userID);
        }catch (\Exception $e){
            return ExceptionResponse::build($e);
        }
        return response()->json($result);
    }
}
