<?php

namespace KMA\IikoTransport\Contracts;

interface IEntity
{
    public function __construct(?array $data = null);

    /**
     * Create entity from an array
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data): static;

    /**
     * Create entity from a json-format string
     * @param string $json
     * @return static
     */
    public static function fromJson(string $json): static;
}
