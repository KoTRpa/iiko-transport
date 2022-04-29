<?php

namespace KMA\IikoTransport\Entities\Delivery\Response\Order\Deleted;

use KMA\IikoTransport\Entities\Entity;

class DeletionMethod extends Entity
{
    /**
     * @required
     * @var string <uuid> ID
     */
    public string $id;

    /**
     * @var string|null Comment
     */
    public ?string $comment = null;

    /**
     * @required
     * @var \KMA\IIkoTransport\Entities\Delivery\Response\Order\Deleted\RemovalType Write-off type.
     */
    public RemovalType $removalType;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->id = $data['id'];
            $this->comment = $data['comment'] ?? null;
            $this->removalType = RemovalType::fromArray($data['removalType']);
        }
    }
}
