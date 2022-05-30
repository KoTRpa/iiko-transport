<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use KMA\IikoTransport\Endpoints\General\Dictionaries\DiscountsRequest;
use KMA\IikoTransport\Endpoints\General\Dictionaries\DiscountsResponse;
use KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesRequest;
use KMA\IikoTransport\Endpoints\General\Dictionaries\PaymentTypesResponse;
use KMA\IikoTransport\Tests\EndpointTestCase;

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
    /**
     * @covers \KMA\IikoTransport\IikoTransport::discounts
     */
    public function testDiscounts()
    {
        $this->runTests(
            'Dictionaries/DiscountsResponse',
            'discounts',
            DiscountsRequest::class,
            DiscountsResponse::class,
            '/api/1/discounts'
        );
    }
}
