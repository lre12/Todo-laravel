<?php


namespace Core\Dtos\User\User;


class UpdateUserDto
{
    private $id;
    private $name;
    private $password;

    /**
     * @param mixed $id
     *
     * @return UpdateUserDto
     */
    public function setId($id): UpdateUserDto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $name
     *
     * @return UpdateUserDto
     */
    public function setName($name): UpdateUserDto
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

    public function setPassword($password): UpdateUserDto
    {
        $this->password = $password;
        return $this;
    }

}
