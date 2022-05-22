<?php

namespace KMA\IikoTransport\Tests;

use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Deprecated;
use KMA\IikoTransport\Tests\JsonFactory;

abstract class EntityTestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var array json fixture namespace (name eg. path in Fixtures) and opt path to json part
     */
    #[ArrayShape(['name' => 'string' , 'path' => 'string'])]
    protected array $fixture = [];

    #[Deprecated]
    protected string $jsonPath = '';

    /**
     * @var string loaded json fixture
     */
    private string $json;

    /**
     * @var string[] of all entity attributes
     */
    protected array $fields;

    /**
     * @var string testing entity full classname
     */
    protected string $entityClass;

    protected function setUp(): void
    {
        /**
         * @deprecated will be removed after all old entity test upgrade
         * TODO: remove after old test upgrade to fixtures
         */
        if ($this->jsonPath) {
            $this->json = file_get_contents($this->jsonPath);
        }

        if (isset($this->fixture['name'])) {
            $this->json = JsonFactory::load($this->fixture['name'])
                ->get($this->fixture['path'] ?? null);
        }
    }

    protected function runCreateTests(): void
    {
        $this->createFromJson();
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

    protected function assertIsDateTimeString(string $value, $message = '')
    {
        // <yyyy-MM-dd HH:mm:ss.fff>
        $pattern = '/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}\.\d{3}$/i';
        $this->assertMatchesRegularExpression($pattern, $value, $message);
    }
}
