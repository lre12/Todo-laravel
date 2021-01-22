<?php
namespace Core\Entities;


use JsonSerializable;

class Base implements JsonSerializable
{
    public function jsonSerialize()
    {
        return [];
    }
}
