<?php

namespace KMA\IikoTransport\Entities\Delivery\Addresses;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Entities\Common\Address\City;

class CitiesWrap extends Entity
{
    /**
     * @required
     * @var string <uuid> Organization ID
     * Can be obtained by /api/1/organizations operation
     */
    public string $organizationId;

    /**
     * Items for organization
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Common\Address\City>
     */
    public Collection $items;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->organizationId = $data['organizationId'];
            $this->items =
                collect($data['items'])
                    ->map(fn (array $item): City => City::fromArray($item));
        }
    }
}
