<?php

namespace KMA\IikoTransport\Entities\Organizations;

use JetBrains\PhpStorm\ArrayShape;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\IRequestBody;

class OrganizationsRequest extends Entity implements IRequestBody
{
    /**
     * @var string[]|null [<uuid>] Organizations IDs which have to be returned. By default - all organizations from apiLogin
     * Can be obtained by /api/1/organizations operation
     */
    public ?array $organizationIds = null;

    /**
     * @var bool A sign whether additional information about the organization should be returned
     * (RMS version, country, restaurantAddress, etc.),
     * or only minimal information should be returned (id and name)
     * @note not supported yet
     */
    public bool $returnAdditionalInfo = false;

    /**
     * @var bool Attribute that shows that response contains disabled organizations.
     */
    public bool $includeDisabled = false;

    const ATTRIBUTES = [
        'organizationIds' => 'string[]',
        'returnAdditionalInfo' => 'bool',
        'includeDisabled' => 'bool',
    ];

    public function __construct(
        #[ArrayShape(self::ATTRIBUTES)]
        ?array $data = null
    )
    {
        if (null !== $data) {
            $this->organizationIds = $data['organizationIds'] ?? null;
            $this->returnAdditionalInfo = $data['returnAdditionalInfo'];
            $this->includeDisabled = $data['includeDisabled'];
        }
    }
}
