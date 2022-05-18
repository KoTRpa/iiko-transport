<?php

namespace KMA\IikoTransport\Contracts;

/**
 * From and to array conversions
 *
 * @mixin \KMA\IikoTransport\Entities\Entity
 */
trait Arrayable
{
    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): static
    {
        return new static($data);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return json_decode(json_encode($this), true);
    }
}
