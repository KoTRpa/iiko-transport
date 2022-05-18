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
     * Returns array representation of current entity
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * Create entity from a json-format string
     * @param string $json
     * @return static
     */
    public static function fromJson(string $json): static;

    /**
     * Returns a json representation of current entity
     * @return string
     */
    public function toJson(): string;
}
