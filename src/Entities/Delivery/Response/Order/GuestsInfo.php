<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class GuestsInfo extends Entity
{
    /**
     * @required
     * @var int Number of persons
     */
    public int $count;

    /**
     * @required
     * @var bool Attribute that shows whether order must be split among guests
     */
    public bool $splitBetweenPersons;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->count = $data['count'];
            $this->splitBetweenPersons = $data['splitBetweenPersons'];
        }
    }
}
