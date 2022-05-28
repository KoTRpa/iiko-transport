<?php

namespace KMA\IikoTransport\Entities\Common\Address;

use KMA\IikoTransport\Entities\Entity;

class Street extends Entity
{
    /**
     * @required
     * @var string <uuid> Street ID in RMS
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
     * @var string|null ID in classifier, e.g., address database
     */
    public ?string $classifierId = null;

    /**
     * @required
     * @var bool Is-Deleted attribute
     */
    public bool $isDeleted;


    public function __construct(?array $data = null)
    {
        if ($data !== null) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->externalRevision = $data['externalRevision'] ?? null;
            $this->classifierId = $data['classifierId'] ?? null;
            $this->isDeleted = $data['isDeleted'];
        }
    }
}
