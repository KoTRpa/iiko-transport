<?php

namespace KMA\IikoTransport\Contracts;

use JetBrains\PhpStorm\ArrayShape;

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

    protected function setRelatedFields(
        #[ArrayShape(['id' => 'string', 'name' => 'string'])]
        array $data
    ): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
    }
}
