<?php

namespace KMA\IikoTransport\Entities\Delivery\Addresses;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Address\Street;
use KMA\IikoTransport\Entities\Entity;

class StreetsResponse extends Entity
{
    use HasCorrelationId;

    /**
     * List of cities
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Address\Street>
     */
    public Collection $streets;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->correlationId = $data['correlationId'];
            $this->streets =
                collect($data['streets'])
                    ->map(fn (array $item): Street => Street::fromArray($item));
        }
    }
}
