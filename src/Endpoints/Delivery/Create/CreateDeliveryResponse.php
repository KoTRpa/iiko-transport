<?php

namespace KMA\IikoTransport\Endpoints\Delivery\Create;

use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderInfo;
use KMA\IikoTransport\Entities\Entity;

class CreateDeliveryResponse extends Entity
{
    use HasCorrelationId;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderInfo Deliveries order
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
