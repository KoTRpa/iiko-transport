<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Entities\Delivery\Response\OrderInfo;

class CreateDeliveryResponse extends Entity
{
    use HasCorrelationId;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\Response\OrderInfo Delivery order
     */
    public OrderInfo $orderInfo;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->correlationId = $data['correlationId'];
            $this->orderInfo = OrderInfo::fromArray($data['orderInfo']);
        }
    }
}
