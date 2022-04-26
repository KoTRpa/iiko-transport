<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Entities\Entity;

class Modifier extends Entity
{
    /**
     * @required
     * @var string <uuid> Modifier item ID
     * Can be obtained by /api/1/nomenclature operation.
     */
    public string $productId;

    /**
     * @required
     * @var float Quantity
     */
    public float $amount;

    /**
     * @var string|null <uuid> Modifiers group ID (for group modifier).
     * Required for a group modifier
     * Can be obtained by /api/1/nomenclature operation
     */
    public ?string $productGroupId = null;

    /**
     * @var float|null Unit price
     */
    public ?float $price = null;

    /**
     * @var string|null <uuid> Unique identifier of the item in the order.
     * MUST be unique for the whole system.
     * Therefore, it must be generated with Guid.NewGuid().
     * If sent null, it generates automatically on iikoTransport side.
     */
    public ?string $positionId = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->productId = $data['productId'];
            $this->amount = (float)$data['amount'];
            $this->productGroupId = $data['productGroupId'] ?? null;
            $this->price = isset($data['price']) ? (float)$data['price'] : null;
            $this->positionId = $data['positionId'] ?? null;
        }
    }
}
