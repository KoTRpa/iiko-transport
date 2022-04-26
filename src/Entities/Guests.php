<?php

namespace KMA\IikoTransport\Entities;

class Guests extends Entity
{
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

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->count = (int)$data['count'];
            $this->splitBetweenPersons = $data['splitBetweenPersons'];
        }
    }
}
