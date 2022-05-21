<?php

namespace KMA\IikoTransport\Entities\Common\Nomenclature;

use KMA\IikoTransport\Entities\Common\Price;
use KMA\IikoTransport\Entities\Entity;

class SizePrice extends Entity
{
    /**
     * @required
     * @var string|null <uuid> Item size ID
     */
    public ?string $sizeId = null;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Common\Price Price per this item size
     */
    public Price $price;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->sizeId = $data['sizeId'] ?? null;
            $this->price = Price::fromArray($data['price']);
        }
    }
}
