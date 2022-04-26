<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Entities\Entity;

class Discount extends Entity
{
    /**
     * @required
     * @var string <uuid> Discount type
     * Can be obtained by /api/1/discounts operation
     */
    public string $discountTypeId;

    /**
     * @required
     * @var float Discount/surcharge sum
     */
    public float $sum;

    /**
     * @var ?array [<uuid>] Order item positions
     * Can be obtained by /api/1/discounts operation
     */
    public ?array $selectivePositions = null;

    /**
     * @required
     * @var string Discount type
     * TODO: make iikoCard discount
     */
    public string $type = 'RMS';
}
