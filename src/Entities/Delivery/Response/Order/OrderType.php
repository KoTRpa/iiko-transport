<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\HasRelationFields;

class OrderType extends Entity
{
    use HasRelationFields;

    /**
     * @required
     * @var string Order type
     * Enum: "Common" "DeliveryByCourier" "DeliveryByClient"
     */
    public string $orderServiceType;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->orderServiceType = $data['orderServiceType'];
        }
    }
}