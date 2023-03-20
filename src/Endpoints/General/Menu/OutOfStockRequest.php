<?php

namespace KMA\IikoTransport\Endpoints\General\Menu;

use JetBrains\PhpStorm\ArrayShape;
use KMA\IikoTransport\Contracts\IRequestBody;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Exceptions\MissingRequiredFieldException;

class OutOfStockRequest extends Entity implements IRequestBody
{
    /**
     * @required
     * @var string[] <uuid> Organizations for which out-of-stock lists will be requested
     * Can be obtained by /api/1/organizations operation
     */
    public array $organizationIds;

    const ATTRIBUTES = [
        'organizationIds' => 'string[]',
    ];

    /**
     * @param array|null $data
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     */
    public function __construct(
        #[ArrayShape(self::ATTRIBUTES)]
        ?array $data = null
    )
    {
        if (null !== $data) {
            if (!isset($data['organizationIds'])) {
                throw new MissingRequiredFieldException('organisationId');
            }

            $this->organizationIds = $data['organizationIds'];
        }
    }
}
