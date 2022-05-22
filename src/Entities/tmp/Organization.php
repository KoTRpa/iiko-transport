<?php

namespace KMA\IikoTransport\Entities;

class Organization
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
}
