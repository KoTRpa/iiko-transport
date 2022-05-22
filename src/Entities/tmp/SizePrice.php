<?php

namespace KMA\IikoTransport\Entities;

class SizePrice
{
    /**
     * @var string|null <uuid> Item size ID
     */
    public ?string $sizeId = null;

    /**
     * @var \KMA\IikoTransport\Entities\Price Price per this item size
     */
    public Price $price;
}
