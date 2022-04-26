<?php

namespace KMA\IikoTransport\Tests;

use phpDocumentor\Reflection\ProjectFactory;

abstract class EntityTestCase extends \PHPUnit\Framework\TestCase
{
    protected string $jsonPath;
    protected string $json;
    protected array $fields;
    protected string $entityClass;

    protected function setUp(): void
    {
        $this->json = file_get_contents($this->jsonPath);
    }

    protected function runCreateTests(): void
    {
        $this->createFromArray();
        $this->createFromJson();
    }

    protected function createFromArray(): void
    {
        $array = json_decode($this->json, true);
        $entity = $this->entityClass::fromArray($array);
        $this->assertHasFields($entity);
        $this->assertFieldValidity($entity);
    }

    protected function createFromJson(): void
    {
        $entity = $this->entityClass::fromJson($this->json);
        $this->assertHasFields($entity);
        $this->assertFieldValidity($entity);
    }

    protected function assertHasFields(mixed $entity): void
    {
        foreach ($this->fields as $field) {
            $this->assertObjectHasAttribute($field, $entity);
        }
    }

    abstract protected function assertFieldValidity(mixed $entity): void;

    protected function assertIsUuid(string $uuid, string $message = ''): void
    {
        $pattern = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';
        $this->assertMatchesRegularExpression($pattern, $uuid, $message);
    }
}
