<?php

namespace KMA\IikoTransport\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Entity;

class AllowedItem extends Entity
{
    /**
     * @required
     * @var string <uuid> Terminal group ID
     * | Can be obtained by /api/1/terminal_groups operation.
     */
    public string $terminalGroupId;

    /**
     * @required
     * @var string <uuid> Organization ID
     * | Can be obtained by /api/1/organizations operation
     */
    public string $organizationId;

    /**
     * @required
     * @var int Delivery duration in minutes
     */
    public int $deliveryDurationInMinutes;

    /**
     * @required
     * @var null|string Delivery zone name which this TerminalGroupId belongs to
     */
    public ?string $zone = null;

    /**
     * @required
     * @var null|string <uuid> Link to "delivery service payment".
     */
    public ?string $deliveryServiceProductId = null;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->terminalGroupId = $data['terminalGroupId'] ?? throw new \InvalidArgumentException('terminalGroupId is undefined');
            $this->organizationId = $data['organizationId'] ?? throw new \InvalidArgumentException('organizationId is undefined');;
            $this->deliveryDurationInMinutes = $data['deliveryDurationInMinutes'] ?? throw new \InvalidArgumentException('deliveryDurationInMinutes is undefined');;
            $this->zone = $data['zone'] ?? null;
            $this->deliveryServiceProductId = $data['deliveryServiceProductId'] ?? null;
        }
    }
}
