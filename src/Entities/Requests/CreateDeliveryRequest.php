<?php

namespace KMA\IikoTransport\Entities\Requests;

use KMA\IikoTransport\Traits\Jsonable;

use KMA\IikoTransport\Entities\CreateOrderSettings;
use KMA\IikoTransport\Entities\CreateDelivery\Order;

class CreateDeliveryRequest
{
    use Jsonable;

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
    public ?string $terminalGroupId;

    /**
     * @var \KMA\IikoTransport\Entities\CreateOrderSettings|null Order creation parameters
     */
    public ?CreateOrderSettings $createOrderSettings = null;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\CreateDelivery\Order Order
     */
    public Order $order;
}
