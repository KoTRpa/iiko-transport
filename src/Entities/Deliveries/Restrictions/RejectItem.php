<?php

namespace KMA\IikoTransport\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Entity;

class RejectItem extends Entity
{
    /**
     * @required
     * @var null|string <uuid> Terminal group ID
     * | Can be obtained by /api/1/terminal_groups operation.
     */
    public ?string $terminalGroupId = null;

    /**
     * @required
     * @var null|string <uuid> Organization ID
     * | Can be obtained by /api/1/organizations operation
     */
    public ?string $organizationId = null;

    /**
     * @var null|string Delivery zone name which this TerminalGroupId belongs to
     */
    public ?string $zone = null;

    /**
     * @required
     * @var string Reject cause code
     * | Enum: "Undefined" "SumIsLessThenMinimum" "DayOfWeekIsUnacceptable" "DeliveryTimeIsUnacceptable" "OutOfTerminalZone"
     */
    public string $rejectCode;

    /**
     * @required
     * @var string Reject hint
     */
    public string $rejectHint;

    /**
     * @var null|\KMA\IikoTransport\Entities\Deliveries\Restrictions\RejectItemData Reject additional information.
     */
    public ?RejectItemData $rejectItemData = null;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->terminalGroupId = $data['terminalGroupId'] ?? null;
            $this->organizationId = $data['organizationId'] ?? null;
            $this->zone = $data['zone'] ?? null;
            $this->rejectCode = $data['rejectCode'] ?? throw new \InvalidArgumentException('rejectCode is undefined');
            $this->rejectHint = $data['rejectHint'] ?? throw new \InvalidArgumentException('rejectHint is undefined');
            $this->rejectItemData = (!empty($data['rejectItemData']))
                ? RejectItemData::fromArray($data['rejectItemData'])
                : null;
        }
    }
}
