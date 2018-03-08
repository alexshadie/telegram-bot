<?php

namespace alexshadie\TelegramBot\Payment;

use PHPUnit\Framework\TestCase;
class ShippingOptionTest extends TestCase
{
    public function testConstructShippingOptionWithCommonFields()
    {
        $obj = new ShippingOption(
            'Jf3c9FrXMQ',
            'OyOQOc8qoS',
            [LabeledPriceStub::getLabeledPriceWithCommonFields2(), LabeledPriceStub::getLabeledPriceWithCommonFields3()]
        );
        $this->assertEquals('Jf3c9FrXMQ', $obj->getId());
        $this->assertEquals('OyOQOc8qoS', $obj->getTitle());
        $this->assertEquals([LabeledPriceStub::getLabeledPriceWithCommonFields2(), LabeledPriceStub::getLabeledPriceWithCommonFields3()], $obj->getPrices());
    }

    public function testConstructShippingOptionWithAllFields()
    {
        $obj = new ShippingOption(
            'Ipnc16P0Yp',
            'ukH9IgzIiK',
            [LabeledPriceStub::getLabeledPriceWithCommonFields1(), LabeledPriceStub::getLabeledPriceWithCommonFields1(), LabeledPriceStub::getLabeledPriceWithCommonFields2()]
        );
        $this->assertEquals('Ipnc16P0Yp', $obj->getId());
        $this->assertEquals('ukH9IgzIiK', $obj->getTitle());
        $this->assertEquals([LabeledPriceStub::getLabeledPriceWithCommonFields1(), LabeledPriceStub::getLabeledPriceWithCommonFields1(), LabeledPriceStub::getLabeledPriceWithCommonFields2()], $obj->getPrices());
    }
}
