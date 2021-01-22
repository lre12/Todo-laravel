<?php
namespace Core\Entities;


use Core\Helpers\JsonSerializableTrait;

class User extends Base
{
    use JsonSerializableTrait;

    private $id;
    private $name;
    private $password;

    public function getName()
    {
        return $this->name;
    }

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

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }
}
