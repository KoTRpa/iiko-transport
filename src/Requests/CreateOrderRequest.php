<?php

namespace KMA\IikoTransport\Requests;

use KMA\IikoTransport\Traits\Jsonable;
use KMA\IikoTransport\Entities\CreateOrder;

class CreateOrderRequest
{
    use Jsonable;

    /**
     * @var string <uuid> Organization ID
     * Can be obtained by /api/1/organizations operation
     */
    public string $organizationId;

    /**
     * @var string <uuid> Front group ID an order must be sent to.
     * Can be obtained by /api/1/terminal_groups operation.
     */
    public string $terminalGroupId;

    /**
     * @var \KMA\IikoTransport\Entities\CreateOrder Order
     */
    public CreateOrder $order;

    /**
     * @var array|null Order creation parameters
     */
    public ?array $createOrderSettings = null;
}
