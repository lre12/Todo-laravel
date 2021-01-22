<?php


namespace Core\Dtos\User;


class LoginDto
{
    private $identification;
    private $password;

    /**
     * @return mixed
     */
    public function getIdentification()
    {
        return $this->identification;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setIdentification($identification): self
    {
        $this->identification = $identification;
        return $this;
    }

    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }
}
