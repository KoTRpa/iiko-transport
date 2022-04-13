<?php

namespace KMA\IikoTransport\Entities;

use KMA\IikoTransport\Contracts\Arrayable;
use KMA\IikoTransport\Contracts\IEntity;
use KMA\IikoTransport\Traits\Jsonable;

/**
 * @deprecated will be moved to TerminalGroup namespace
 * TODO: move to terminals namespace
 */
class TerminalGroupItem implements IEntity
{
    use Arrayable, Jsonable;

    /**
     * @required
     * @var string <uuid> Delivery group ID.
     * Can be obtained by /api/1/terminal_groups operation
     */
    public string $id;

    /**
     * @required
     * @var string <uuid> Organization ID to which delivery group belongs.
     * Can be obtained by /api/1/organizations operation
     */
    public string $organizationId;

    /**
     * @required
     * @var string Terminal group name
     */
    public string $name;

    public function __construct(?array $data = null)
    {
        if ($data !== null) {
            $this->validate($data);
            $this->id = $data['id'];
            $this->organizationId = $data['organizationId'];
            $this->name = $data['name'];
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
