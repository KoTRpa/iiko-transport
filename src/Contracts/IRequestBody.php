<?php

namespace KMA\IikoTransport\Contracts;

interface IRequestBody
{
    public function toJson(): string;
}
