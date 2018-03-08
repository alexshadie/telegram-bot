<?php

namespace alexshadie\TelegramBot\Payment;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Objects\UserStub;

class PreCheckoutQueryTest extends TestCase
{
    public function testConstructPreCheckoutQueryWithCommonFields()
    {
        $obj = new PreCheckoutQuery(
            'qA554Utvuk',
            UserStub::getUserWithCommonFields2(),
            '9Q7R1jXZHG',
            883837800,
            'ZckgHw9zqF'
        );
        $this->assertEquals('qA554Utvuk', $obj->getId());
        $this->assertEquals(UserStub::getUserWithCommonFields2(), $obj->getFrom());
        $this->assertEquals('9Q7R1jXZHG', $obj->getCurrency());
        $this->assertEquals(883837800, $obj->getTotalAmount());
        $this->assertEquals('ZckgHw9zqF', $obj->getInvoicePayload());
        $this->assertNull($obj->getShippingOptionId());
        $this->assertNull($obj->getOrderInfo());
    }

    public function testConstructPreCheckoutQueryWithAllFields()
    {
        $obj = new PreCheckoutQuery(
            '637E9zFyLN',
            UserStub::getUserWithCommonFields3(),
            'UoST7zxQGA',
            1295543292,
            'idWGgWLcNl',
            '0EFgHGhwEv',
            OrderInfoStub::getOrderInfoWithCommonFields3()
        );
        $this->assertEquals('637E9zFyLN', $obj->getId());
        $this->assertEquals(UserStub::getUserWithCommonFields3(), $obj->getFrom());
        $this->assertEquals('UoST7zxQGA', $obj->getCurrency());
        $this->assertEquals(1295543292, $obj->getTotalAmount());
        $this->assertEquals('idWGgWLcNl', $obj->getInvoicePayload());
        $this->assertEquals('0EFgHGhwEv', $obj->getShippingOptionId());
        $this->assertEquals(OrderInfoStub::getOrderInfoWithCommonFields3(), $obj->getOrderInfo());
    }
}
