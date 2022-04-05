<?php

namespace KMA\IikoTransport\Entities;

class TerminalGroupItem
{
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
}
