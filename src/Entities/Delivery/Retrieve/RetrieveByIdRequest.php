<?php

namespace KMA\IikoTransport\Entities\Delivery\Retrieve;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\IRequestBody;

class RetrieveByIdRequest extends Entity implements IRequestBody
{
    /**
     * @required
     * @var string <uuid> Organization ID for which an order search will be performed
     * | Can be obtained by /api/1/organizations operation
     */
    public string $organizationId;

    /**
     * @required
     * @var string[] [<uuid>] IDs of orders information on which is required
     */
    public array $orderIds;

    /**
     * @var string[]|null Source keys
     */
    public ?array $sourceKeys = null;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->organizationId = $data['organizationId'];
            $this->orderIds = $data['orderIds'];
            $this->sourceKeys = $data['sourceKeys'] ?? null;
        }
    }
}
