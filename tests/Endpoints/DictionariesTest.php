<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use KMA\IikoTransport\Tests\EndpointTestCase;
use KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesRequest;
use KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesResponse;

class DictionariesTest extends EndpointTestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::paymentTypes
     */
    public function testPaymentTypes()
    {
        $this->runTests(
            'Dictionaries/PaymentTypesResponse',
            'paymentTypes',
            PaymentTypesRequest::class,
            PaymentTypesResponse::class,
            '/api/1/payment_types'
        );
    }
}
