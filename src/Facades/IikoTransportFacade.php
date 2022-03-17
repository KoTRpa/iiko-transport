<?php

namespace KMA\IikoTransport\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * IikoTransportFacade
 */
class IikoTransportFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'IikoTransport';
    }
}
