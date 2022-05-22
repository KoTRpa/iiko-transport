<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Contracts\Jsonable;

class ProductCategory
{
    use Jsonable;

    /**
     * @var string Product category ID
     */
    public string $id;

    /**
     * @var string Name
     */
    public string $name;

    /**
     * @var bool Is deleted attribute
     */
    public bool $isDeleted;
}
