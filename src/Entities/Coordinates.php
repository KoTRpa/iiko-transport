<?php

namespace KMA\IikoTransport\Entities;

class Coordinates extends Entity
{
    /**
     * @required
     * @var float Latitude
     */
    public float $latitude;

    /**
     * @required
     * @var float Longitude
     */
    public float $longitude;


    public function __construct(?array $data = null)
    {
        if (null !== $data) {
            $this->latitude = $data['latitude'];
            $this->longitude = $data['longitude'];
        }
    }
}
