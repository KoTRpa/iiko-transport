<?php

namespace KMA\IikoTransport\Entities\CreateDelivery;

use KMA\IikoTransport\Traits\Jsonable;

use KMA\IikoTransport\Entities\Customer;
use KMA\IikoTransport\Entities\Guests;

class Order
{
    use Jsonable;

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
     * @var DeliveryPoint|null Delivery point details.
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
     * @var \KMA\IikoTransport\Entities\CreateDelivery\OrderItem[] Order items
     * [iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.OrderItem]
     */
    public array $items;

    /**
     * TODO: make combo entity
     * @var array|null Combos included in order
     * Array of objects (iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.Combo)
     */
    public ?array $combos = null;

    /**
     * @var \KMA\IikoTransport\Entities\CreateDelivery\Payment[]|null Order payment components
     * [iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.Payment]
     * Type IikoCard allowed from version 7.1.5
     */
    public ?array $payments = null;

    /**
     * TODO: make Tip entity
     * @var array|null Order tips components.
     * Array of objects (iikoTransport.PublicApi.Contracts.Deliveries.Request.CreateOrder.TipsPayment) Nullable
     */
    public ?array $tips = null;

    /**
     * @var string|null
     * The string key (marker) of the source (partner - api user) that created the order.
     * Needed to limit the visibility of orders for external integration.
     */
    public ?string $sourceKey = null;

    /**
     * @var \KMA\IikoTransport\Entities\CreateDelivery\DiscountsInfo|null Discounts/surcharges
     */
    public ?DiscountsInfo $discountsInfo = null;

    /**
     * TODO: iikoCard entity create
     * @var array|null Information about iikoCard5
     */
    public ?array $iikoCard5Info = null;
}
