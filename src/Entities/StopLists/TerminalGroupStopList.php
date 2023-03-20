<?php

namespace KMA\IikoTransport\Entities\StopLists;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Exceptions\MissingRequiredFieldException;

class TerminalGroupStopList extends Entity
{
    /**
     * @required
     * @var string <uuid>
     */
    public string $terminalGroupId;

    /**
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\StopLists\StopListItem>
     */
    public Collection $items;

    /**
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     */
    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            if (!isset($data['terminalGroupId'])) {
                throw new MissingRequiredFieldException('terminalGroupId');
            }
            if (!isset($data['items'])) {
                throw new MissingRequiredFieldException('items');
            }
            $this->terminalGroupId = $data['terminalGroupId'];
            $this->items = collect($data['items'])
                ->map(fn (array $item): StopListItem => StopListItem::fromArray($item));
        }
    }
}
