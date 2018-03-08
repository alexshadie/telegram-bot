<?php

namespace alexshadie\TelegramBot\Payment;

use PHPUnit\Framework\TestCase;
class SuccessfulPaymentTest extends TestCase
{
    public function testConstructSuccessfulPaymentWithCommonFields()
    {
        $obj = new SuccessfulPayment(
            'Xs9QTHUdtu',
            1030724500,
            'QKdl29nxgS',
            'ePFzBRE1oV',
            'ihV7XazodV'
        );
        $this->assertEquals('Xs9QTHUdtu', $obj->getCurrency());
        $this->assertEquals(1030724500, $obj->getTotalAmount());
        $this->assertEquals('QKdl29nxgS', $obj->getInvoicePayload());
        $this->assertNull($obj->getShippingOptionId());
        $this->assertNull($obj->getOrderInfo());
        $this->assertEquals('ePFzBRE1oV', $obj->getTelegramPaymentChargeId());
        $this->assertEquals('ihV7XazodV', $obj->getProviderPaymentChargeId());
    }

    public function testConstructSuccessfulPaymentWithAllFields()
    {
        $obj = new SuccessfulPayment(
            'IjNBYjIeRg',
            677414269,
            'vBcYWEAucm',
            '9QpBLFAzp9',
            'Jakb3hngSB',
            'zIBPWFLJrp',
            OrderInfoStub::getOrderInfoWithCommonFields3()
        );
        $this->assertEquals('IjNBYjIeRg', $obj->getCurrency());
        $this->assertEquals(677414269, $obj->getTotalAmount());
        $this->assertEquals('vBcYWEAucm', $obj->getInvoicePayload());
        $this->assertEquals('zIBPWFLJrp', $obj->getShippingOptionId());
        $this->assertEquals(OrderInfoStub::getOrderInfoWithCommonFields3(), $obj->getOrderInfo());
        $this->assertEquals('9QpBLFAzp9', $obj->getTelegramPaymentChargeId());
        $this->assertEquals('Jakb3hngSB', $obj->getProviderPaymentChargeId());
    }
}
