<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Contracts\Jsonable;

class Size
{
    use Jsonable;

    /**
     * @var string ID
     */
    public string $id;

    /**
     * @var string Name
     */
    public string $name;

    /**
     * @var int|null Priority (serial number) of the size in the size scale
     */
    public ?int $priority = null;

    /**
     * @var bool|null Is the default size in the size scale
     */
    public ?bool $isDefault = null;
}
