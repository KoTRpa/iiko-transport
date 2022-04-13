<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Entities\Address;
use KMA\IikoTransport\Entities\Coordinates;

class DeliveryPoint
{
    /**
     * @var \KMA\IikoTransport\Entities\Coordinates|null Delivery address coordinates
     * Allowed from version 7.7.3
     */
    public ?Coordinates $coordinates = null;

    /**
     * @var \KMA\IikoTransport\Entities\Address|null Order delivery address
     */
    public ?Address $address = null;

    /**
     * @var string|null Delivery location custom code in customer's API system.
     * [0..100] characters
     */
    public ?string $externalCartographyId = null;

    /**
     * @var string|null Additional information
     * [0..500] characters
     */
    public ?string $comment = null;
}
