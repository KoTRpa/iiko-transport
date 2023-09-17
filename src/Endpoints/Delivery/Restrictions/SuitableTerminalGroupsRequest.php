<?php

namespace KMA\IikoTransport\Endpoints\Delivery\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\IRequestBody;
use KMA\IikoTransport\Entities\Common\Coordinates;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryAddress;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\RestrictionsOrderItem;
use KMA\IikoTransport\Entities\Entity;

class SuitableTerminalGroupsRequest extends Entity implements IRequestBody
{
    /**
     * @required
     * @var string[] [<uuid>] Organizations IDs which delivery restrictions have to be returned
     * Can be obtained by /api/1/organizations operation
     */
    public array $organizationIds;

    /**
     * @var null|\KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryAddress Delivery address
     */
    public ?DeliveryAddress $deliveryAddress = null;

    /**
     * @var null|\KMA\IikoTransport\Entities\Common\Coordinates Order location
     */
    public ?Coordinates $orderLocation = null;

    /**
     * @var null|\Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Deliveries\Restrictions\RestrictionsOrderItem> Order location
     */
    public ?Collection $orderItems = null;

    /**
     * @required
     * @var bool Type of delivery service.
     */
    public bool $isCourierDelivery;

    /**
     * @var null|string <yyyy-MM-dd HH:mm:ss.fff> Delivery date (Local for delivery terminal).
     */
    public ?string $deliveryDate = null;

    /**
     * @var null|float Sum
     */
    public ?float $deliverySum = null;

    /**
     * @var null|float Discounts sum
     */
    public ?float $discountSum = null;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->organizationIds = $data['organizationIds'] ?? throw new \InvalidArgumentException('organizationIds is empty');
            $this->deliveryAddress = (!empty($data['deliveryAddress']))
                ? DeliveryAddress::fromArray($data['deliveryAddress'])
                : null;
            $this->orderLocation = (!empty($data['orderLocation']))
                ? Coordinates::fromArray($data['orderLocation'])
                : null;
            $this->orderItems = collect($data['orderItems'])->map(
                fn (array $item): RestrictionsOrderItem => RestrictionsOrderItem::fromArray($item)
            );
            $this->isCourierDelivery = $data['isCourierDelivery'];
            $this->deliveryDate = $data['deliveryDate'] ?? null;
            $this->deliverySum = $data['deliverySum'] ?? null;
            $this->discountSum = $data['discountSum'] ?? null;
        }
    }
}
