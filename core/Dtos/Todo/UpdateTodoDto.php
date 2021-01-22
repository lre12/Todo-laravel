<?php


namespace Core\Dtos\User\User\User\User\Todo;


class UpdateTodoDto
{
    private $id;
    private $user_id;
    private $title;
    private $desc;
    private $is_complete;

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
    public function setUserId($user_id): UpdateTodoDto
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): UpdateTodoDto
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc): UpdateTodoDto
    {
        $this->desc = $desc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsComplete()
    {
        return $this->is_complete;
    }

    /**
     * @param mixed $is_complete
     */
    public function setIsComplete($is_complete): UpdateTodoDto
    {
        $this->is_complete = $is_complete;
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

    public function setId($id): UpdateTodoDto
    {
        $this->id = $id;
        return $this;
    }
}

