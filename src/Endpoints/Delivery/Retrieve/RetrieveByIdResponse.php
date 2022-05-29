<?php

namespace KMA\IikoTransport\Endpoints\Delivery\Retrieve;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderInfo;
use KMA\IikoTransport\Entities\Entity;

class RetrieveByIdResponse extends Entity
{
    use HasCorrelationId;

    /**
     * @required
     * @var string[] [<uuid>] IDs of orders information on which is required
     */
    public array $orderIds;

    /**
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderInfo>
     */
    public Collection $orders;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->correlationId = $data['correlationId'];
            $this->orders =
                collect($data['orders'])
                    ->map(fn(array $item): OrderInfo => OrderInfo::fromArray($item));
        }
    }
}
