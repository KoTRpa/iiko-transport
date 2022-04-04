<?php

namespace KMA\IikoTransport\Entities\Requests;

use KMA\IikoTransport\Traits\Jsonable;

class OrganizationsRequest
{
    use Jsonable;

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
}
