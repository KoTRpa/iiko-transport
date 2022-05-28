<?php

namespace KMA\IikoTransport\Endpoints\General\TerminalGroups;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsWrap;

class TerminalGroupsResponse extends Entity
{
    use HasCorrelationId;

    /**
     * List of terminal groups broken down by organizations
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsWrap>
     */
    public Collection $terminalGroups;

    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->correlationId = $data['correlationId'];
            $this->terminalGroups =
                collect($data['terminalGroups'])
                    ->map(fn (array $item): TerminalGroupsWrap => TerminalGroupsWrap::fromArray($item));
        }
    }
}
