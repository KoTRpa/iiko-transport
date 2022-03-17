<?php

namespace KMA\IikoTransport\Helpers;

class Json
{
    /**
     * Determine given string is a json object.
     *
     * @param string $string
     * @return bool
     */
    public static function isValidJsonString(string $string): bool
    {
        json_decode($string);

        return json_last_error() === JSON_ERROR_NONE;
    }

    /**
     * @param string $string
     * @param bool $assoc
     * @param int $depth
     * @param int $flags
     * @return mixed
     * @throws \JsonException
     */
    public static function json_decode(string $string, bool $assoc = false, int $depth = 512, int $flags = 0): mixed
    {
        $json = json_decode($string, $assoc, $depth, $flags);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \JsonException('Invalid json string');
        }

        return $json;
    }
}
