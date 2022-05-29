<?php

namespace KMA\IikoTransport\Entities\Deliveries\Create;

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


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->discountTypeId = $data['discountTypeId'];
            $this->sum = (float)$data['sum'];
            $this->selectivePositions = $data['selectivePositions'] ?? null;
            $this->type = $data['type'];
        }
    }
}
