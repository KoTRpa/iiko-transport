<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Traits\Jsonable;

class Guests
{
    use Jsonable;

    /**
     * @required
     * @var int Number of persons in order. This field defines the number of cutlery sets
     */
    public int $count = 1;

    /**
     * @required
     * @var bool Attribute that shows whether order must be split among guests.
     */
    public bool $splitBetweenPersons = false;
}
