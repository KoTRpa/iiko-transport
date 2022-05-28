<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use KMA\IikoTransport\Tests\EndpointTestCase;
use KMA\IikoTransport\Endpoints\General\TerminalGroups\TerminalGroupsRequest;
use KMA\IikoTransport\Endpoints\General\TerminalGroups\TerminalGroupsResponse;

class TerminalGroupsTest extends EndpointTestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::organizations
     */
    public function testNomenclature()
    {
        $this->runTests(
            'TerminalGroups/TerminalGroupsResponse',
            'terminalGroups',
            TerminalGroupsRequest::class,
            TerminalGroupsResponse::class,
            '/api/1/terminal_groups'
        );
    }
}
