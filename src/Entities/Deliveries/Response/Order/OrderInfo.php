<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class OrderInfo extends Entity
{
    /**
     * @required
     * @var string <uuid> Delivery order ID
     */
    public string $id;

    /**
     * @required
     * @var string <uuid> Organization ID
     * Can be obtained by `/api/1/organizations` operation
     */
    public string $organizationId;

    /**
     * @required
     * @var int <uuid> Timestamp of most recent order change that took place on iikoTransport server
     */
    public int $timestamp;

    /**
     * @required
     * @var string Order creation status
     * In case of asynchronous creation, it allows to track the instance an order was validated/created in iikoFront.
     * Enum: "Success" "InProgress" "Error"
     */
    public string $creationStatus;

    /**
     * @var null|\KMA\IikoTransport\Entities\Deliveries\Response\Order\ErrorInfo Order creation error details
     * Required only if "creationStatus"="Error"
     */
    public ?ErrorInfo $errorInfo = null;

    /**
     * @var null|\KMA\IikoTransport\Entities\Deliveries\Response\Order\Order Order creation details
     * Field is filled up if "creationStatus"="Success".
     */
    public ?Order $order = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->organizationId = $data['organizationId'];
            $this->timestamp = (int)$data['timestamp'];
            $this->creationStatus = $data['creationStatus'];
            $this->errorInfo = isset($data['errorInfo'])
                ? ErrorInfo::fromArray($data['errorInfo'])
                : null;
            $this->order = isset($data['order'])
                ? Order::fromArray($data['order'])
                : null;
        }
    }
}
