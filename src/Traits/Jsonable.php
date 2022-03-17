<?php

namespace KMA\IikoTransport\Traits;

trait Jsonable
{
    /**
     * @return array
     */
    public function toJson(): array
    {
        return array_filter((array)$this, function ($el) {
            return ($el !== null);
        });
    }

    public static function fromJson(string $json)
    {
        return new static();
    }

}
