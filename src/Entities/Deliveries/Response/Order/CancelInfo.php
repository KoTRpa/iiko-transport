<?php

namespace KMA\IikoTransport\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Entity;

class CancelInfo extends Entity
{
    /**
     * @required
     * @var string <yyyy-MM-dd HH:mm:ss.fff> Cancellation time (Local for delivery terminal)
     */
    public string $whenCancelled;

    /**
     * @required
     * @var \KMA\IikoTransport\Entities\Deliveries\Response\Order\Cause Delivery cancellation reason
     */
    public Cause $cause;

    /**
     * @var string|null Delivery cancellation comment
     */
    public ?string $comment = null;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->whenCancelled = $data['whenCancelled'];
            $this->cause = Cause::fromArray($data['cause']);
            $this->comment = $data['comment'] ?? null;
        }
    }
}
