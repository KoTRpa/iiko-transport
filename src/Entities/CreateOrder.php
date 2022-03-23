<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Traits\Jsonable;

class CreateOrder
{
    use Jsonable;

    /**
     * @var string|null <uuid> Order ID
     */
    public ?string $id = null;

    /**
     * @var string[]|null [<uuid>] Table IDs
     * Can be obtained by /api/1/reserve/available_restaurant_sections operation
     */
    public ?array $tableIds = null;

    /**
     * @var \KMA\IikoTransport\Entities\Customer|null Guest
     */
    public ?Customer $customer = null;

    /**
     * @var string|null Guest phone
     */
    public ?string $phone = null;

    /**
     * @var \KMA\IikoTransport\Entities\Guests|null Guests information (count)
     */
    public ?Guests $guests = null;

    /**
     * @var string|null Tab name (only for fastfood terminals group in tab mode)
     */
    public ?string $tabName = null;

    /**
     * @var \KMA\IikoTransport\Entities\OrderItem[] Order items
     * Array of objects (iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.OrderItem)
     */
    public array $items;

    /**
     * TODO: make combo entity
     * @var array|null Combos included in order
     * Array of objects (iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.Combo)
     */
    public ?array $combos = null;

    /**
     * @var \KMA\IikoTransport\Entities\Payment[]|null Order payment components
     * Array of objects (iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.Payment)
     */
    public ?array $payments = null;

    /**
     * TODO: make Tip entity
     * @var array|null Order tips components.
     * Array of objects (iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.TipsPayment) Nullable
     */
    public ?array $tips = null;

    /**
     * @var string|null
     * The string key (marker) of the source (partner - api user) that created the order.
     * Needed to limit the visibility of orders for external integration.
     */
    public ?string $sourceKey = null;

    /**
     * @var \KMA\IikoTransport\Entities\DiscountsInfo|null Discounts/surcharges
     */
    public ?DiscountsInfo $discountsInfo = null;

    /**
     * TODO: iikoCard entity create
     * @var array|null Information about iikoCard5
     */
    public ?array $iikoCard5Info = null;

    /**
     * @var string|null <uuid> Order type ID
     * Can be obtained by /api/1/deliveries/order_types operation
     */
    public ?string $orderTypeId = null;
}
