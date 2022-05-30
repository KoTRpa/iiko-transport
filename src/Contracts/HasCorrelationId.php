<?php

namespace KMA\IikoTransport\Contracts;

use JetBrains\PhpStorm\ArrayShape;

trait HasCorrelationId
{
    /**
     * @var string <uuid> operations unique id
     */
    public string $correlationId;

    protected function setCorrelationId(
        #[ArrayShape(['correlationId' => 'string'])]
        array $data
    ): void
    {
        $this->correlationId = $data['correlationId'];
    }
}
