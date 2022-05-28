<?php

namespace KMA\IikoTransport\Endpoints\General\Menu;

use JetBrains\PhpStorm\ArrayShape;
use KMA\IikoTransport\Contracts\IRequestBody;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Exceptions\MissingRequiredFieldException;

class NomenclatureRequest extends Entity implements IRequestBody
{
    /**
     * @required
     * @var string <uuid> Organization ID
     * Can be obtained by /api/1/organizations operation
     */
    public string $organizationId;

    /**
     * @var int|null Initial revision.
     * Items list will be received only in case there is a newer revision in the database.
     */
    public ?int $startRevision = null;

    const ATTRIBUTES = [
        'organizationId' => 'string',
        'startRevision' => 'int'
    ];

    /**
     * @param array|null $data
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     */
    public function __construct(
        #[ArrayShape(self::ATTRIBUTES)]
        ?array $data = null
    )
    {
        if (null !== $data) {
            if (!isset($data['organizationId'])) {
                throw new MissingRequiredFieldException('organisationId');
            }

            $this->organizationId = $data['organizationId'];
            $this->startRevision = $data['startRevision'] ?? null;
        }
    }
}
