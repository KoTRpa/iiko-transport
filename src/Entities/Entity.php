<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Contracts\IEntity;
use KMA\IikoTransport\Contracts\Arrayable;
use KMA\IikoTransport\Contracts\Jsonable;
use KMA\IikoTransport\Contracts\RequiredFields;

abstract class Entity implements \JsonSerializable, IEntity
{
    use Arrayable;
    use Jsonable;
    use RequiredFields;

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
