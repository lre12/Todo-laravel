<?php


namespace Core\Dtos\User\User\User\User\Todo;


class DeleteTodoDto
{
    private $id;
    private $user_id;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): DeleteTodoDto
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */

    public function setId($id): DeleteTodoDto
    {
        $this->id = $id;
        return $this;
    }
}
