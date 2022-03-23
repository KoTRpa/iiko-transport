<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Traits\Jsonable;

class Guests
{
    use Jsonable;

    /**
     * @var int Guests count
     */
    public int $count;
}
