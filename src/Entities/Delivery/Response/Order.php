<?php

namespace KMA\IikoTransport\Entities\Delivery\Response;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Entities\Delivery\Response\Order\DiscountItem;
use KMA\IikoTransport\Entities\Delivery\Response\Order\OrderCombo;
use KMA\IikoTransport\Entities\Delivery\Response\Order\OrderItem;
use KMA\IikoTransport\Entities\Delivery\Response\Order\OrderType;
use KMA\IikoTransport\Entities\Delivery\Response\Order\PaymentItem;
use KMA\IikoTransport\Entities\Delivery\Response\Order\TipsPaymentItem;
use KMA\IikoTransport\Entities\Delivery\Response\Order\DeliveryPoint;
use KMA\IikoTransport\Entities\Delivery\Response\Order\Conception;
use KMA\IikoTransport\Entities\Delivery\Response\Order\CourierInfo;
use KMA\IikoTransport\Entities\Delivery\Response\Order\ExternalCourierService;
use KMA\IikoTransport\Entities\Delivery\Response\Order\GuestsInfo;
use KMA\IikoTransport\Entities\Delivery\Response\Order\MarketingSource;
use KMA\IikoTransport\Entities\Delivery\Response\Order\Operator;
use KMA\IikoTransport\Entities\Delivery\Response\Order\Problem;
use KMA\IikoTransport\Entities\Delivery\Response\Order\Customer;
use KMA\IikoTransport\Entities\Delivery\Response\Order\CancelInfo;

class Order extends Entity
{
    /**
     * @var string|null ID of delivery serving as source for splitting by FCRs.
     */
    public ?string $parentDeliveryId = null;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\Response\Order\Customer Delivery customer
     */
    public Customer $customer;

    /**
     * @required
     * @var string Delivery phone number
     */
    public string $phone;

    /**
     * @var null|\KMA\IikoTransport\Entities\Delivery\Response\Order\DeliveryPoint Delivery point details
     * Not required if order type is customer pickup. Otherwise, required
     */
    public ?DeliveryPoint $deliveryPoint = null;

    /**
     * @required
     * @var string Delivery status
     * Enum: "Unconfirmed" "WaitCooking" "ReadyForCooking" "CookingStarted" "CookingCompleted" "Waiting" "OnWay" "Delivered" "Closed" "Cancelled"
     */
    public string $status;

    /**
     * @var null|\KMA\IikoTransport\Entities\Delivery\Response\Order\CancelInfo
     * Delivery cancellation details. Required only if delivery is canceled, i.e. status=Canceled
     */
    public ?CancelInfo $cancelInfo = null;

    /**
     * @var null|\KMA\IikoTransport\Entities\Delivery\Response\Order\CourierInfo Driver information
     */
    public ?CourierInfo $courierInfo = null;

    /**
     * @required
     * @var string <yyyy-MM-dd HH:mm:ss.fff> Order fulfillment time (Local for the terminal)
     */
    public string $completeBefore;

    /**
     * @required
     * @var string <yyyy-MM-dd HH:mm:ss.fff> Delivery creation time in iikoFront (Local for the terminal)
     */
    public string $whenCreated;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> Delivery confirmation time (Local for the terminal).
     */
    public ?string $whenConfirmed = null;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> Service printing time (Local for the terminal)
     */
    public ?string $whenPrinted = null;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> Delivery dispatch time (Local for the terminal)
     */
    public ?string $whenSended = null;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> Actual delivery time (Local for delivery terminal)
     */
    public ?string $whenDelivered = null;

    /**
     * @var string|null Order comment
     */
    public ?string $comment = null;

    /**
     * @var null|\KMA\IikoTransport\Entities\Delivery\Response\Order\Problem Problem flag
     */
    public ?Problem $problem = null;

    /**
     * @var null|\KMA\IikoTransport\Entities\Delivery\Response\Order\Operator Operator that took order
     */
    public ?Operator $operator = null;

    /**
     * @var null|\KMA\IikoTransport\Entities\Delivery\Response\Order\MarketingSource Marketing source
     */
    public ?MarketingSource $marketingSource = null;

    /**
     * @var int|null Duration of delivery (in minutes)
     */
    public ?int $deliveryDuration = null;

    /**
     * @var int|null Ordinal number in route list.
     * Field is filled up at the time of delivery allocation by logistics in iikoFront.
     * If logistics is not in use, the field is not filled up.
     */
    public ?int $indexInCourierRoute = null;

    /**
     * @required
     * @var string <yyyy-MM-dd HH:mm:ss.fff> The time when you need to start cooking an order (Local for the terminal)
     */
    public string $cookingStartTime;

    /**
     * @required
     * @var bool Order is deleted
     */
    public bool $isDeleted;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> Moment of time when CloudAPI received the request to create the order (UTC)
     */
    public ?string $whenReceivedByApi = null;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> Moment of time when the order first received and saved from iikoFront (UTC).
     */
    public ?string $whenReceivedFromFront = null;

    /**
     * @var string|null <uuid> Tells that this delivery has been moved from terminal group with id
     * "movedFromTerminalGroupId" by cancelling delivery with deliveryId "movedFromDeliveryId".
     * | Allowed from version 7.5.4
     */
    public ?string $movedFromDeliveryId = null;

    /**
     * @var string|null <uuid> Tells that this delivery has been moved from terminal group with id
     * "movedFromTerminalGroupId" by cancelling delivery with deliveryId "movedFromDeliveryId"
     * | Allowed from version 7.5.4
     */
    public ?string $movedFromTerminalGroupId = null;

    /**
     * @var string|null <uuid> Tells that this delivery has been moved from terminal group with id
     * "movedFromTerminalGroupId" by cancelling delivery with deliveryId "movedFromDeliveryId"
     * | Allowed from version 7.5.4
     */
    public ?string $movedFromOrganizationId = null;

    /**
     * @var null|\KMA\IikoTransport\Entities\Delivery\Response\Order\ExternalCourierService ECS info.
     * | Allowed from version 7.7.7
     */
    public ?ExternalCourierService $externalCourierService = null;

    /**
     * @required
     * @var float Order amount (after discount or surcharge)
     */
    public float $sum;

    /**
     * @required
     * @var int Delivery No
     */
    public int $number;

    /**
     * @var string|null Delivery source
     */
    public ?string $sourceKey = null;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> Invoice printing time (guest bill time).
     */
    public ?string $whenBillPrinted = null;

    /**
     * @var string|null <yyyy-MM-dd HH:mm:ss.fff> Delivery closing time (Local for delivery terminal).
     */
    public ?string $whenClosed = null;

    /**
     * @var null|\KMA\IikoTransport\Entities\Delivery\Response\Order\Conception Concept
     */
    public ?Conception $conception = null;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\Response\Order\GuestsInfo Information about order guests
     */
    public GuestsInfo $guestsInfo;

    /**
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderItem>
     * Order items
     */
    public Collection $items;

    /**
     * @var null|\Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderCombo>
     * combos
     */
    public ?Collection $combos = null;

    /**
     * @var null|\Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Delivery\Response\Order\PaymentItem>
     * Payments
     */
    public ?Collection $payments = null;

    /**
     * @var null|\Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Delivery\Response\Order\TipsPaymentItem>
     * Tips
     */
    public ?Collection $tips = null;

    /**
     * @var null|\Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Delivery\Response\Order\DiscountItem>
     * Discounts
     */
    public ?Collection $discounts = null;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderType Order type
     */
    public OrderType $orderType;

    /**
     * @required
     * @var string <uuid> ID of the terminal group where the order is located
     */
    public string $terminalGroupId;

    /**
     * @required
     * @var float|null The amount of processed payments.
     * null - only for unsupported iikoFront versions.
     * | Allowed from version 7.6.0.
     */
    public ?float $processedPaymentsSum = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->parentDeliveryId = $data['parentDeliveryId'] ?? null;
            $this->customer = Customer::fromArray($data['customer']);
            $this->phone = $data['phone'];
            $this->deliveryPoint = isset($data['deliveryPoint'])
                ? DeliveryPoint::fromArray($data['deliveryPoint'])
                : null;
            $this->status = $data['status'];
            $this->cancelInfo = isset($data['cancelInfo'])
                ? CancelInfo::fromArray($data['cancelInfo'])
                : null;
            $this->courierInfo = isset($data['courierInfo'])
                ? CourierInfo::fromArray($data['courierInfo'])
                : null;
            $this->completeBefore = $data['completeBefore'];
            $this->whenCreated = $data['whenCreated'];
            $this->whenConfirmed = $data['whenConfirmed'] ?? null;
            $this->whenPrinted = $data['whenPrinted'] ?? null;
            $this->whenSended = $data['whenSended'] ?? null;
            $this->whenDelivered = $data['whenDelivered'] ?? null;
            $this->comment = $data['comment'] ?? null;
            $this->problem = isset($data['problem'])
                ? Problem::fromArray($data['problem'])
                : null;
            $this->operator = isset($data['operator'])
                ? Operator::fromArray($data['operator'])
                : null;
            $this->marketingSource = isset($data['marketingSource'])
                ? MarketingSource::fromArray($data['marketingSource'])
                : null;
            $this->deliveryDuration = isset($data['deliveryDuration'])
                ? (int)$data['deliveryDuration']
                : null;
            $this->indexInCourierRoute = isset($data['indexInCourierRoute'])
                ? (int)$data['indexInCourierRoute']
                : null;
            $this->cookingStartTime = $data['cookingStartTime'];
            $this->isDeleted = $data['isDeleted'];
            $this->whenReceivedByApi = $data['whenReceivedByApi'] ?? null;
            $this->whenReceivedFromFront = $data['whenReceivedFromFront'] ?? null;
            $this->movedFromDeliveryId = $data['movedFromDeliveryId'] ?? null;
            $this->movedFromTerminalGroupId = $data['movedFromTerminalGroupId'] ?? null;
            $this->movedFromOrganizationId = $data['movedFromOrganizationId'] ?? null;
            $this->externalCourierService = isset($data['externalCourierService'])
                ? ExternalCourierService::fromArray($data['externalCourierService'])
                : null;
            $this->sum = (float)$data['sum'];
            $this->number = (int)$data['number'];
            $this->sourceKey = $data['sourceKey'] ?? null;
            $this->whenBillPrinted = $data['whenBillPrinted'] ?? null;
            $this->whenClosed = $data['whenClosed'] ?? null;
            $this->conception = isset($data['conception'])
                ? Conception::fromArray($data['conception'])
                : null;
            $this->guestsInfo = GuestsInfo::fromArray($data['guestsInfo']);

            $this->items = collect($data['items'])->map(function(array $item): OrderItem {
                return OrderItem::fromArray($item);
            });

            $this->combos = isset($data['combos'])
                ? collect($data['combos'])->map(function(array $item): OrderCombo {
                      return OrderCombo::fromArray($item);
                  })
                : null;

            $this->payments = isset($data['payments'])
                ? collect($data['payments'])->map(function(array $item): PaymentItem {
                      return PaymentItem::fromArray($item);
                  })
                : null;

            $this->tips = isset($data['tips'])
                ? collect($data['tips'])->map(function(array $item): TipsPaymentItem {
                      return TipsPaymentItem::fromArray($item);
                  })
                : null;

            $this->discounts = isset($data['discounts'])
                ? collect($data['discounts'])->map(function(array $item): DiscountItem {
                      return DiscountItem::fromArray($item);
                  })
                : null;

            $this->discounts = isset($data['discounts'])
                ? collect($data['discounts'])->map(function(array $item): DiscountItem {
                      return DiscountItem::fromArray($item);
                  })
                : null;

            $this->orderType = OrderType::fromArray($data['orderType']);
            $this->terminalGroupId = $data['terminalGroupId'];
            $this->processedPaymentsSum = isset($data['processedPaymentsSum'])
                ? (float)$data['processedPaymentsSum']
                : null;
        }
    }
}
