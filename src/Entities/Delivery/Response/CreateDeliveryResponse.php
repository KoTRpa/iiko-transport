<?php

namespace KMA\IikoTransport\Entities\Delivery\Response;

use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\OrderInfo;
use KMA\IikoTransport\Entities\Entity;

class CreateDeliveryResponse extends Entity
{
    use HasCorrelationId;

    public OrderInfo $orderInfo;
    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->correlationId = $data['correlationId'];
        }
    }
}
