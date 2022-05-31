<?php

namespace KMA\IikoTransport\Endpoints\Delivery\Restrictions;

use JetBrains\PhpStorm\ArrayShape;
use KMA\IikoTransport\Contracts\IRequestBody;
use KMA\IikoTransport\Entities\Entity;

class DeliveryRestrictionsRequest extends Entity implements IRequestBody
{
    /**
     * @required
     * @var string[] [<uuid>] Organizations IDs which delivery restrictions have to be returned
     * Can be obtained by /api/1/organizations operation
     */
    public array $organizationIds;

    /**
     * @param array|null $data
     */
    public function __construct(
        #[ArrayShape(['organizationIds' => 'string'])]
        ?array $data = null
    )
    {
        if (null !== $data) {
            $this->organizationIds = $data['organizationIds'];
        }
    }
}
