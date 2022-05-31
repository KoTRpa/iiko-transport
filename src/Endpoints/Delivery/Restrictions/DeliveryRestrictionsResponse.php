<?php

namespace KMA\IikoTransport\Endpoints\Delivery\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryRestrictions;
use KMA\IikoTransport\Entities\Entity;

class DeliveryRestrictionsResponse extends Entity
{
    use HasCorrelationId;

    /**
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryRestrictions>
     */
    public Collection $deliveryRestrictions;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->setCorrelationId($data);
            $this->deliveryRestrictions =
                collect($data['deliveryRestrictions'])
                    ->map(fn(array $item): DeliveryRestrictions => DeliveryRestrictions::fromArray($item));
        }
    }
}
