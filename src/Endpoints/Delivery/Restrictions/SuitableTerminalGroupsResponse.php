<?php

namespace KMA\IikoTransport\Endpoints\Delivery\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Common\Coordinates;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\AllowedItem;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\RejectItem;
use KMA\IikoTransport\Entities\Entity;

class SuitableTerminalGroupsResponse extends Entity
{
    use HasCorrelationId;

    /**
     * @required
     * @var bool A sign of successful verification
     */
    public bool $isAllowed;

    /**
     * @required
     * @var null|string Delivery address ID in external mapping system
     */
    public ?string $addressExternalId = null;

    /**
     * @required
     * @var null|\KMA\IikoTransport\Entities\Common\Coordinates Coordinates returned by geocoding service.
     */
    public ?Coordinates $location = null;

    /**
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Deliveries\Restrictions\AllowedItem> Suitable terminal groups with a delivery duration for them
     */
    public Collection $allowedItems;

    /**
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Deliveries\Restrictions\RejectItem> Rejected items with cause
     */
    public Collection $rejectedItems;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->setCorrelationId($data);
            $this->isAllowed = $data['isAllowed'] ?? throw new \InvalidArgumentException('isAllowed is undefined');
            $this->addressExternalId = $data['addressExternalId'] ?? null;
            $this->location = (!empty($data['location']))
                ? Coordinates::fromArray($data['location'])
                : null;
            $this->allowedItems = collect($data['allowedItems'])->map(
                fn (array $item): AllowedItem => AllowedItem::fromArray($item)
            );
            $this->rejectedItems = collect($data['rejectedItems'])->map(
                fn (array $item): RejectItem => RejectItem::fromArray($item)
            );
        }
    }
}
