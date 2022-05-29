<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Contracts\HasRelationFields;
use KMA\IikoTransport\Entities\Entity;

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
            $this->setRelatedFields($data);
            $this->orderServiceType = $data['orderServiceType'];
        }
    }
}
