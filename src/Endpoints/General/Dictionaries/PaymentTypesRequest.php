<?php

namespace KMA\IikoTransport\Endpoints\General\Dictionaries;

use KMA\IikoTransport\Contracts\IRequestBody;
use KMA\IikoTransport\Entities\Entity;

class PaymentTypesRequest extends Entity implements IRequestBody
{
    /**
     * @required
     * @var string[] [<uuid>] Organizations IDs which payment types have to be returned
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
