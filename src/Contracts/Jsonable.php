<?php

namespace KMA\IikoTransport\Contracts;

trait Jsonable
{
    /**
     * @param int $flags json_encode flags
     * @return string
     */
    public function toJson(int $flags = 0): string
    {
        return json_encode($this, $flags);
    }

    /**
     * @param string $json
     * @return static
     * @throws \JsonException
     */
    public static function fromJson(string $json): static
    {
        $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        return new static($data);
    }

}
