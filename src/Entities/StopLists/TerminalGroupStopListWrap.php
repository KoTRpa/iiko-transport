<?php

namespace KMA\IikoTransport\Entities\StopLists;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Entity;

class TerminalGroupStopListWrap extends Entity
{
    /**
     * @required
     * @var string <uuid> Organization ID
     * Can be obtained by /api/1/organizations operation
     */
    public string $organizationId;

    /**
     * Items for organization
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\StopLists\TerminalGroupStopList>
     */
    public Collection $items;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->organizationId = $data['organizationId'];
            $this->items =
                collect($data['items'])
                    ->map(fn (array $item): TerminalGroupStopList => TerminalGroupStopList::fromArray($item));
        }
    }
}
