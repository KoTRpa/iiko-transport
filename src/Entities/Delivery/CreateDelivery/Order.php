<?php

namespace KMA\IikoTransport\Entities\Delivery\CreateDelivery;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Customer;
use KMA\IikoTransport\Entities\DeliveryPoint;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Entities\Guests;
use KMA\IikoTransport\Entities\IikoCard5Info;

class Order extends Entity
{
    /**
     * @var string|null <uuid> Order ID
     * Must be unique.
     * If sent null, it generates automatically on iikoTransport side.
     */
    public ?string $id = null;

    /**
     * @var string|null Order fulfillment date
     * <yyyy-MM-dd HH:mm:ss.fff>
     * Date and time must be local for delivery terminal, without time zone (take a look at example).
     * If null, order is urgent and time is calculated based on customer settings, i.e. the shortest delivery time possible.
     * Permissible values: from current day and 30 days on.
     */
    public ?string $completeBefore = null;

    /**
     * @required
     * @var string Customer phone
     * Must begin with symbol "+" and must be at least 8 digits.
     */
    public string $phone;

    /**
     * @var string|null <uuid> Order type ID
     * Can be obtained by /api/1/deliveries/order_types operation
     * One of the fields required: orderTypeId or orderServiceType
     */
    public ?string $orderTypeId = null;

    /**
     * @var string|null Order service type
     * Enum: "DeliveryByCourier" "DeliveryByClient"
     * One of the fields required: orderTypeId or orderServiceType
     */
    public ?string $orderServiceType = null;

    /**
     * @var \KMA\IikoTransport\Entities\DeliveryPoint|null Delivery point details.
     * Not required in case of customer pickup. Otherwise, required.
     */
    public ?DeliveryPoint $deliveryPoint = null;

    /**
     * @var string|null Order comment
     */
    public ?string $comment = null;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Customer Customer
     */
    public Customer $customer;

    /**
     * @var \KMA\IikoTransport\Entities\Guests|null Guests information (count)
     */
    public ?Guests $guests = null;

    /**
     * @var string|null <uuid> Marketing source (advertisement) ID
     * Can be obtained by /api/1/marketing_sources operation
     */
    public ?string $marketingSourceId = null;

    /**
     * @var string|null <uuid> Operator ID
     * Allowed from version 7.6.3
     */
    public ?string $operatorId = null;

    /**
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Delivery\CreateDelivery\OrderItem> Order items
     * [iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.OrderItem]
     */
    public Collection $items;

    /**
     * @var null|\Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Combo> Combos included in order
     * Array of objects (iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.Combo)
     */
    public ?Collection $combos = null;

    /**
     * @var null|\Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Delivery\CreateDelivery\Payment> Order payment components
     * [iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.Payment]
     * Type IikoCard allowed from version 7.1.5
     */
    public ?Collection $payments = null;

    /**
     * @var null|\Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Delivery\CreateDelivery\TipsPayment> Order tips components.
     * Array of objects (iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.TipsPayment) Nullable
     */
    public ?Collection $tips = null;

    /**
     * @var string|null
     * The string key (marker) of the source (partner - api user) that created the order.
     * Needed to limit the visibility of orders for external integration.
     */
    public ?string $sourceKey = null;

    /**
     * @var \KMA\IikoTransport\Entities\Delivery\CreateDelivery\DiscountsInfo|null Discounts/surcharges
     */
    public ?DiscountsInfo $discountsInfo = null;

    /**
     * @var \KMA\IikoTransport\Entities\IikoCard5Info|null Information about iikoCard5
     */
    public ?IikoCard5Info $iikoCard5Info = null;

    /**
     * @param array|null $data
     */
    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'] ?? null;
            $this->completeBefore = $data['completeBefore'] ?? null;
            $this->phone = $data['phone'];
            $this->orderTypeId = $data['orderTypeId'] ?? null;
            $this->orderServiceType = $data['orderServiceType'] ?? null;

            $this->deliveryPoint = isset($data['deliveryPoint'])
                ? DeliveryPoint::fromArray($data['deliveryPoint'])
                : null;

            $this->comment = $data['comment'] ?? null;

            $this->customer = Customer::fromArray($data['customer']);

            $this->guests = isset($data['guests'])
                ? Guests::fromArray($data['guests'])
                : null;

            $this->marketingSourceId = $data['marketingSourceId'] ?? null;
            $this->operatorId = $data['operatorId'] ?? null;

            $this->items = collect($data['items'])->map(function(array $item): OrderItem {
                return OrderItem::fromArray($item);
            });

            $this->combos = isset($data['combos'])
                ? collect($data['combos'])->map(function(array $combo): Combo {
                      return Combo::fromArray($combo);
                  })
                : null;

            $this->payments = isset($data['payments'])
                ? collect($data['payments'])->map(function(array $p): Payment {
                      return Payment::fromArray($p);
                  })
                : null;
            $this->tips = isset($data['tips'])
                ? collect($data['tips'])->map(function (array $t): TipsPayment {
                      return TipsPayment::fromArray($t);
                  })
                : null;

            $this->sourceKey = $data['sourceKey'] ?? null;

            $this->discountsInfo = isset($data['discountsInfo'])
                ? DiscountsInfo::fromArray($data['discountsInfo'])
                : null;

            $this->iikoCard5Info = isset($data['iikoCard5Info'])
                ? IikoCard5Info::fromArray($data['iikoCard5Info'])
                : null;
        }
    }
}
