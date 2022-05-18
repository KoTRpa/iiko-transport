<?php

namespace KMA\IikoTransport\Contracts;

use KMA\IikoTransport\Exceptions\MissingRequiredFieldException;

trait RequiredFields
{
    /**
     * @param array $source
     * @return void
     * @throws MissingRequiredFieldException
     */
    public function validateRequiredFields(array $source): void
    {
        foreach ($this->requiredFields() as $r) {
            if (!isset($source[$r])) {
                throw new MissingRequiredFieldException($r);
            }
        }
    }

    protected function requiredFields(): array
    {
        return [];
    }
}
