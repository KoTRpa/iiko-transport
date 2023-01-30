<?php

namespace KMA\IikoTransport\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Entity;

class DeliveryRestrictionItem extends Entity
{
    /**
     * @required
     * @var float|null The minimum order amount for a given point in a given time interval in this delivery zone
     */
    public float|null $minSum;

    /**
     * @required
     * @var string|null <uuid> Terminal group ID
     * | Can be obtained by `/api/1/terminal_groups` operation.
     */
    public ?string $terminalGroupId = null;

    /**
     * @required
     * @var string|null <uuid> Organization ID
     * | Can be obtained by `/api/1/organizations` operation
     */
    public ?string $organizationId = null;

    /**
     * @required
     * @var string|null Name of delivery zone from cartography
     */
    public string|null $zone;

    /**
     * @required
     * @var int Days of the week
     */
    public int $weekMap;

    /**
     * @required
     * @var int|null The time from which the point can process orders from the selected zone, in minutes from the beginning of the day
     */
    public int|null $from;

    /**
     * @required
     * @var int|null The maximum time at which a point can carry an order to a given zone, in minutes from the beginning of the day
     */
    public int|null $to;

    /**
     * @required
     * @var int Priority of point in delivery zone
     */
    public int $priority;

    /**
     * @required
     * @var int Delivery duration in delivery zone
     */
    public int $deliveryDurationInMinutes;

    /**
     * @required
     * @var string|null <uuid> Link to "delivery service payment"
     */
    public string|null $deliveryServiceProductId;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->minSum = $data['minSum'];
            $this->terminalGroupId = $data['terminalGroupId'];
            $this->organizationId = $data['organizationId'];
            $this->zone = $data['zone'];
            $this->weekMap = $data['weekMap'];
            $this->from = $data['from'];
            $this->to = $data['to'];
            $this->priority  = $data['priority'];
            $this->deliveryDurationInMinutes = $data['deliveryDurationInMinutes'];
            $this->deliveryServiceProductId = $data['deliveryServiceProductId'];
        }
    }
}
