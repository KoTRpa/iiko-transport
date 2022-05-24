<?php

namespace KMA\IikoTransport\Entities\TerminalGroups;

use JetBrains\PhpStorm\ArrayShape;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\IRequestBody;

class TerminalGroupsRequest extends Entity implements IRequestBody
{
    /**
     * @required
     * @var string[] [<uuid>]Organizations IDs for which information is requested
     * Can be obtained by /api/1/organizations operation
     */
    public array $organizationIds;

    /**
     * @var bool|null Attribute that shows that response contains disabled terminal groups
     */
    public ?bool $includeDisabled = null;

    const ATTRIBUTES = [
        'organizationIds' => 'string',
        'includeDisabled' => 'bool'
    ];

    public function __construct(
        #[ArrayShape(self::ATTRIBUTES)]
        ?array $data = null
    )
    {
        if (null !== $data) {
            $this->organizationIds = $data['organizationIds'];
            $this->includeDisabled = $data['includeDisabled'] ?? null;
        }
    }
}
