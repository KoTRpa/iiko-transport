<?php

namespace KMA\IikoTransport;

use KMA\IikoTransport\Endpoints;
use JsonMapper;

class IikoTransport
{
    use Traits\Http;

    use Endpoints\Auth,
        Endpoints\Nomenclature,
        Endpoints\Delivery;

    protected JsonMapper $mapper;

    public function __construct(protected array $config) {
        $this->mapper = new JsonMapper();
        $this->mapper->bEnforceMapType = false;
    }


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
