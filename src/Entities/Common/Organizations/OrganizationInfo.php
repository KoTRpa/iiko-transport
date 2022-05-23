<?php

namespace KMA\IikoTransport\Entities\Common\Organizations;

use KMA\IikoTransport\Entities\Entity;

/**
 * TODO: Extended Organization
 */
class OrganizationInfo extends Entity
{
    /**
     * @required
     * @var string Enum(Simple, Extended)
     */
    public string $responseType;

    /**
     * @required
     * @var string <uuid> Organization ID
     */
    public string $id;

    /**
     * @required
     * @var string Organization name
     */
    public string $name;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->responseType = $data['responseType'];
            $this->id = $data['id'];
            $this->name = $data['name'];
        }
    }
}
