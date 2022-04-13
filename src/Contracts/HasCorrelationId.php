<?php

namespace KMA\IikoTransport\Contracts;

trait HasCorrelationId
{
    /**
     * @var string <uuid> operations unique id
     */
    public string $correlationId;
}
