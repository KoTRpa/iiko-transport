<?php

namespace KMA\IikoTransport\Endpoints\General\Menu;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Contracts\HasCorrelationId;
use KMA\IikoTransport\Entities\Entity;
use KMA\IikoTransport\Entities\StopLists\TerminalGroupStopListWrap;

class OutOfStockResponse extends Entity
{
    use HasCorrelationId;

    /**
     * Stock list group
     * @required
     * @var \Illuminate\Support\Collection<int, \KMA\IikoTransport\Entities\StopLists\TerminalGroupStopListWrap>
     */
    public Collection $terminalGroupStopLists;

    /**
     * @param array|null $data
     */
    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->correlationId = $data['correlationId'];

            $this->terminalGroupStopLists =
                collect($data['terminalGroupStopLists'])
                    ->map(fn (array $item): TerminalGroupStopListWrap => TerminalGroupStopListWrap::fromArray($item));
        }
    }
}
