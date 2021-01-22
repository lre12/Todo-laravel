<?php


namespace Core\Dtos\User\User\User;


class DeleteUserDto
{
    private $id;
    private $name;
    private $password;

    /**
     * @param mixed $id
     *
     * @return DeleteUserDto
     */
    public function setId($id): DeleteUserDto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $name
     *
     * @return DeleteUserDto
     */
    public function setName($name): DeleteUserDto
    {
        $this->name = $name;
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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}
