<?php

namespace KMA\IikoTransport\Endpoints\General\Dictionaries;

use KMA\IikoTransport\Contracts\IRequestBody;
use KMA\IikoTransport\Entities\Entity;

class DiscountsRequest extends Entity implements IRequestBody
{
    /**
     * @required
     * @var string[] Organization IDs that require discounts return
     * Can be obtained by /api/1/organizations operation
     */
    public array $organizationIds;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->organizationIds = $data['organizationIds'];
        }
    }
}
