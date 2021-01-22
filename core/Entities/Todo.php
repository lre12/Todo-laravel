<?php


namespace Core\Entities;


use Core\Helpers\JsonSerializableTrait;

class Todo extends Base
{
    use JsonSerializableTrait;

    private $id;
    private $user_id;
    private $title;
    private $desc;
    private $is_complete;

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
    public function setId($id): Todo
    {
        $this->id = $id;
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
    public function setTitle($title): Todo
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
    public function setDesc($desc): Todo
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
     * @return Todo
     */
    public function setIsComplete($is_complete): Todo
    {
        $this->is_complete = $is_complete;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     * @return Todo
     */
    public function setUserId($user_id): Todo
    {
        $this->user_id = $user_id;
        return $this;
    }


}
