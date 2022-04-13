<?php

namespace KMA\IikoTransport\Traits;

/**
 * @deprecated will be moved to contract namespace
 * TODO: move to contracts
 */
trait Jsonable
{
    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode(array_filter((array)$this, function ($el) {
            return ($el !== null);
        }));
    }

    public static function fromJson(string $json): static
    {
        $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        return new static($data);
    }

}
