<?php

namespace KMA\IikoTransport\Endpoints\General\Dictionaries;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Entities\RmsItemsWrap\DiscountsWrap;

class DiscountsResponse extends Entity
{
    use HasCorrelationId;

    /**
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\RmsItemsWrap\DiscountsWrap>
     * List of payment types and terminal groups where they are available.
     */
    public Collection $discounts;

    public function __construct(?array $data = null)
    {
        $this->correlationId = $data['correlationId'];
        $this->discounts =
            collect($data['discounts'])
                ->map(fn (array $pt): DiscountsWrap => DiscountsWrap::fromArray($pt));
    }
}
