<?php

namespace alexshadie\TelegramBot\Payment;

use PHPUnit\Framework\TestCase;
class OrderInfoTest extends TestCase
{
    public function testConstructOrderInfoWithCommonFields()
    {
        $obj = new OrderInfo(

        );
        $this->assertNull($obj->getName());
        $this->assertNull($obj->getPhoneNumber());
        $this->assertNull($obj->getEmail());
        $this->assertNull($obj->getShippingAddress());
    }

    public function testConstructOrderInfoWithAllFields()
    {
        $obj = new OrderInfo(
            '6uhBG6uVlz',
            'petJU2FpgA',
            'usqOvr6pSg',
            ShippingAddressStub::getShippingAddressWithCommonFields2()
        );
        $this->assertEquals('6uhBG6uVlz', $obj->getName());
        $this->assertEquals('petJU2FpgA', $obj->getPhoneNumber());
        $this->assertEquals('usqOvr6pSg', $obj->getEmail());
        $this->assertEquals(ShippingAddressStub::getShippingAddressWithCommonFields2(), $obj->getShippingAddress());
    }
}
