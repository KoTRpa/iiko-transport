<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class Cause extends Entity
{
    /**
     * @required
     * @var string <uuid> ID
     */
    public string $id;

    /**
     * @required
     * @var string Description
     */
    public string $name;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
        }
    }
}
