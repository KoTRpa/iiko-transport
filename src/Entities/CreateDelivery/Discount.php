<?php

namespace KMA\IikoTransport\Entities\CreateDelivery;

use KMA\IikoTransport\Traits\Jsonable;

class Discount
{
    use Jsonable;

    /**
     * @required
     * @var string <uuid> Discount type
     * Can be obtained by /api/1/discounts operation
     */
    public string $discountTypeId;

    /**
     * @var float <uuid> Discount/surcharge sum
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
