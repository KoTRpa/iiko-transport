<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Entities\Entity;

/**
 * TODO: make compound type
 */
class OrderItem extends Entity
{
    /**
     * @required
     * @var string <uuid> ID of menu item
     * Can be obtained by /api/1/nomenclature operation
     */
    public string $productId;

    /**
     * @var \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Modifier[]|null Modifiers
     * [iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.Modifier]
     */
    public ?array $modifiers = null;

    /**
     * @var float|null Price per item unit
     * Can be sent different from the price in the base menu
     */
    public ?float $price = null;

    /**
     * @var string|null <uuid> Unique identifier of the item in the order.
     * MUST be unique for the whole system.
     * Therefore, it must be generated with Guid.NewGuid().
     * If sent null, it generates automatically on iikoTransport side.
     */
    public ?string $positionId = null;

    /**
     * @required
     * @var string Product
     * for Compound see other OrderItem
     */
    public string $type = 'Product';

    /**
     * @var float Quantity
     * [0 .. 999.999]
     */
    public float $amount;

    /**
     * @required
     * @var string|null <uuid> Size ID
     * Required if a stock list item has a size scale
     */
    public ?string $productSizeId = null;

    /**
     * TODO: make combo information entity
     * @var array|null Combo details if combo includes order item
     */
    public ?array $comboInformation = null;

    /**
     * @var string|null Comment
     * [0..255] characters
     */
    public ?string $comment = null;
}
