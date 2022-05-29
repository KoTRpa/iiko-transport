<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Contracts\HasRelationFields;
use KMA\IikoTransport\Entities\Entity;

class Street extends Entity
{
    use HasRelationFields;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Deliveries\Response\Order\City City
     */
    public City $city;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->setRelatedFields($data);
            $this->city = City::fromArray($data['city']);
        }
    }
}
