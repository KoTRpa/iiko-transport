<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Entities\Entity;

class DiscountsInfo extends Entity
{
    /**
     * TODO: make card entity
     * @var array|null Track of discount card to be applied to order
     * Can be obtained by /api/1/deliveries/order_types operation
     */
    public ?array $card = null;

    /**
     * @var \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Discount[]|null Discounts/surcharges
     * Array of objects (iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.Discount)
     * Type iikoCard allowed from version 7.4.4
     */
    public ?array $discounts = null;
}
