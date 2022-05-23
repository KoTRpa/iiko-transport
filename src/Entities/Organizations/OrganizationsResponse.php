<?php

namespace KMA\IikoTransport\Entities\Organizations;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Entities\Common\Organizations\OrganizationInfo;

class OrganizationsResponse extends Entity
{
    use HasCorrelationId;

    /**
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\Common\Organizations\OrganizationInfo>
     * List of organizations
     * Can be obtained by /api/1/organizations operation
     */
    public Collection $organizations;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->correlationId = $data['correlationId'];
            $this->organizations =
                collect($data['organizations'])
                    ->map(fn (array $item): OrganizationInfo => OrganizationInfo::fromArray($item));
        }
    }
}
