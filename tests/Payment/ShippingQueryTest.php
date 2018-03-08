<?php

namespace alexshadie\TelegramBot\Payment;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Objects\UserStub;

class ShippingQueryTest extends TestCase
{
    public function testConstructShippingQueryWithCommonFields()
    {
        $obj = new ShippingQuery(
            '2bAtKxklA4',
            UserStub::getUserWithCommonFields3(),
            'akXokEIj3G',
            ShippingAddressStub::getShippingAddressWithCommonFields2()
        );
        $this->assertEquals('2bAtKxklA4', $obj->getId());
        $this->assertEquals(UserStub::getUserWithCommonFields3(), $obj->getFrom());
        $this->assertEquals('akXokEIj3G', $obj->getInvoicePayload());
        $this->assertEquals(ShippingAddressStub::getShippingAddressWithCommonFields2(), $obj->getShippingAddress());
    }

    public function testConstructShippingQueryWithAllFields()
    {
        $obj = new ShippingQuery(
            'HmwiKRTMVG',
            UserStub::getUserWithCommonFields3(),
            'kvOv3jTziN',
            ShippingAddressStub::getShippingAddressWithCommonFields3()
        );
        $this->assertEquals('HmwiKRTMVG', $obj->getId());
        $this->assertEquals(UserStub::getUserWithCommonFields3(), $obj->getFrom());
        $this->assertEquals('kvOv3jTziN', $obj->getInvoicePayload());
        $this->assertEquals(ShippingAddressStub::getShippingAddressWithCommonFields3(), $obj->getShippingAddress());
    }
}
