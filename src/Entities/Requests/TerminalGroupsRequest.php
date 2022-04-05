<?php

namespace KMA\IikoTransport\Entities\Requests;

use KMA\IikoTransport\Traits\Jsonable;

class TerminalGroupsRequest
{
    use Jsonable;

    /**
     * @required
     * @var string[] [<uuid>]Organizations IDs for which information is requested
     * Can be obtained by /api/1/organizations operation
     */
    public array $organizationIds;

    /**
     * @var bool Attribute that shows that response contains disabled terminal groups
     */
    public bool $includeDisabled = false;
}
