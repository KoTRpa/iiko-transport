<?php

namespace KMA\IikoTransport\Contracts;

trait Arrayable
{
    public static function fromArray(array $data): static
    {
        return new static($data);
    }
}
