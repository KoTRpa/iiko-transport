<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Traits\Jsonable;

class DiscountsInfo
{
    use Jsonable;


    /**
     * TODO: make card entity
     * @var array|null Track of discount card to be applied to order
     * Can be obtained by /api/1/deliveries/order_types operation
     */
    public ?array $card = null;

    /**
     * @var \KMA\IikoTransport\Entities\CreateOrder\Discount[]|null Discounts/surcharges
     * Array of objects (iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.Discount)
     */
    public ?array $discounts = null;
}
