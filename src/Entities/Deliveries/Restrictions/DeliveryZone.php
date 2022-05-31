<?php

namespace KMA\IikoTransport\Entities\Deliveries\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Common\Coordinates;
use KMA\IikoTransport\Entities\Entity;

class DeliveryZone extends Entity
{
    /**
     * @required
     * @var string Polygon name
     */
    public string $name;

    /**
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Common\Coordinates>
     * A set of points describing a polygon
     */
    public Collection $coordinates;

    /**
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryZoneAddressBinding>
     * A set of addresses describing a polygon
     */
    public Collection $addresses;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->name = $data['name'];
            $this->coordinates =
                collect($data['coordinates'])
                    ->map(fn (array $item): Coordinates => Coordinates::fromArray($item));
            $this->addresses =
                collect($data['addresses'])
                    ->map(fn (array $item): DeliveryZoneAddressBinding => DeliveryZoneAddressBinding::fromArray($item));
        }
    }
}
