<?php

namespace KMA\IikoTransport\Entities;

class CreateOrderSettings
{
    /**
     * @var int|null Timeout in seconds that specifies how much time is given for order reaching iikoFront.
     * After this time, order is nullified if iikoFront doesn't take it.
     * By default - 8 seconds.
     */
    public ?int $transportToFrontTimeout = null;
}
