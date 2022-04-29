<?php

namespace KMA\IikoTransport\Contracts;

trait HasRelationFields
{
    /**
     * @required
     * @var string <uuid> ID of related Entity
     */
    public string $id;

    /**
     * @required
     * @var string name from related Entity
     */
    public string $name;
}
