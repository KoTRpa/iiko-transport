<?php

namespace KMA\IikoTransport\Entities\Deliveries\Create;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Entity;

class DiscountsInfo extends Entity
{
    /**
     * @var \KMA\IikoTransport\Entities\Deliveries\Create\Card|null Track of discount card to be applied to order
     */
    public ?Card $card = null;

    /**
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Deliveries\Create\Discount>|null Discounts/surcharges
     * Array of objects (iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.Discount)
     * Type iikoCard allowed from version 7.4.4
     */
    public ?Collection $discounts = null;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->card = Card::fromArray($data['card']);
            $this->discounts = collect($data['discounts'])->map(function(array $d) {
                return Discount::fromArray($d);
            });
        }
    }
}
