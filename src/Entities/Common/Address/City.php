<?php

namespace KMA\IikoTransport\Entities\Common\Address;

use KMA\IikoTransport\Entities\Entity;

class City extends Entity
{
    /**
     * @required
     * @var string <uuid> City ID in RMS
     */
    public string $id;

    /**
     * @required
     * @var string Name
     */
    public string $name;

    /**
     * @var int|null External revision
     */
    public ?int $externalRevision = null;

    /**
     * @required
     * @var bool Is-Deleted attribute
     */
    public bool $isDeleted;

    /**
     * @var string|null ID in classifier, e.g., address database
     */
    public ?string $classifierId = null;

    /**
     * @var string|null City additional information
     */
    public ?string $additionalInfo = null;


    public function __construct(?array $data = null)
    {
        if ($data !== null) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->externalRevision = $data['externalRevision'] ?? null;
            $this->isDeleted = $data['isDeleted'];
            $this->classifierId = $data['classifierId'] ?? null;
            $this->additionalInfo = $data['additionalInfo'] ?? null;
        }
    }

    /**
     * @param array $data
     * @return void
     * @throws \InvalidArgumentException
     */
    private function validate(array $data): void
    {
        if (!isset($data['id'])) {
            throw new \InvalidArgumentException('Field "id" is undefined');
        }

        if (!isset($data['organizationId'])) {
            throw new \InvalidArgumentException('Field "organizationId" is undefined');
        }

        if (!isset($data['name'])) {
            throw new \InvalidArgumentException('Field "name" is undefined');
        }
    }
}
