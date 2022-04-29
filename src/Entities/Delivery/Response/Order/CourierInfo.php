<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class CourierInfo extends Entity
{
    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\Response\Order\Courier Order driver
     */
    public Courier $courier;

    /**
     * @required
     * @var bool Whether driver is selected manually
     */
    public bool $isCourierSelectedManually;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->courier = Courier::fromArray($data['courier']);
            $this->isCourierSelectedManually = $data['isCourierSelectedManually'];
        }
    }
}
