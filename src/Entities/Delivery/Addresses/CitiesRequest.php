<?php

namespace KMA\IikoTransport\Entities\Delivery\Addresses;

use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\IRequestBody;

class CitiesRequest extends Entity implements IRequestBody
{
    /**
     * @required
     * @var string[] [<uuid>] IDs of organizations that require data return
     * | Can be obtained by /api/1/organizations operation
     */
    public array $organizationIds;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->organizationIds = $data['organizationIds'];
        }
    }
}
