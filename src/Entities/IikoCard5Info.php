<?php

namespace KMA\IikoTransport\Entities;

class IikoCard5Info extends Entity
{
    /**
     * @var string|null Coupon No. that has to be considered when calculating loyalty program
     */
    public ?string $coupon = null;

    /**
     * @var string[]|null [<uuid>] Information about applied manual conditions
     */
    public ?array $applicableManualConditions = null;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->coupon = $data['coupon'] ?? null;
            $this->applicableManualConditions = $data['applicableManualConditions'] ?? null;
        }
    }
}
