<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Traits\Jsonable;

class OrderItemModifier
{
    use Jsonable;

    /**
     * @var string <uuid> Modifier item ID
     * Can be obtained by /api/1/nomenclature operation.
     */
    public string $productId;

    /**
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
}
