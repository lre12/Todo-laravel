<?php


namespace Core\Dtos\User\User\User\User;


class CreateUserDto
{
    private $name;
    private $password;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }
}


