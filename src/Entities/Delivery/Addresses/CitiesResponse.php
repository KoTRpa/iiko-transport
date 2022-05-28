<?php

namespace KMA\IikoTransport\Entities\Delivery\Addresses;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Entity;

class CitiesResponse extends Entity
{
    use HasCorrelationId;

    /**
     * List of cities
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Delivery\Addresses\CitiesWrap>
     */
    public Collection $cities;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->correlationId = $data['correlationId'];
            $this->cities =
                collect($data['cities'])
                    ->map(fn (array $item): CitiesWrap => CitiesWrap::fromArray($item));
        }
    }
}
