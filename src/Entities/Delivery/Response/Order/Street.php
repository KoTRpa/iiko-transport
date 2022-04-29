<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\HasRelationFields;

class Street extends Entity
{
    use HasRelationFields;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\Response\Order\City City
     */
    public City $city;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->city = City::fromArray($data['city']);
        }
    }
}
