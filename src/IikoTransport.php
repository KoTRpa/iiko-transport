<?php

namespace KMA\IikoTransport;

use JetBrains\PhpStorm\ArrayShape;
use KMA\IikoTransport\Endpoints;

class IikoTransport
{
    use Http\Http;

    use Endpoints\Dictionaries,
        Endpoints\Menu,
        Endpoints\Delivery,
        Endpoints\Organizations,
        Endpoints\TerminalGroups;

    /**
     * @param array $config
     */
    public function __construct(
        #[ArrayShape([ 'url' => 'string', 'login' => 'string', 'http' => 'array' ])]
        protected array $config
    ) {}

    /**
     * Get the specified configuration value.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getConfig($key, $default = null): mixed
    {
        return data_get($this->config, $key, $default);
    }
}
