<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use KMA\IikoTransport\Entities\Entity;

class CreateDeliveryRequest extends Entity
{
    /**
     * @required
     * @var string <uuid> Organization ID
     * Can be obtained by /api/1/organizations operation
     */
    public string $organizationId;

    /**
     * @var string|null <uuid> Front group ID an order must be sent to
     * Can be obtained by /api/1/terminal_groups operation.
     */
    public ?string $terminalGroupId = null;

    /**
     * @var \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateOrderSettings|null Order creation parameters
     */
    public ?CreateOrderSettings $createOrderSettings = null;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Order Order
     */
    public Order $order;
}
