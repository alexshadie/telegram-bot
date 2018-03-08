<?php

namespace alexshadie\TelegramBot\Payment;

use PHPUnit\Framework\TestCase;
class InvoiceTest extends TestCase
{
    public function testConstructInvoiceWithCommonFields()
    {
        $obj = new Invoice(
            'ZWhCdpZ3d2',
            'qyLtPKZnhi',
            'gTtfkNgBU3',
            'eOcAC4v6j1',
            293105483
        );
        $this->assertEquals('ZWhCdpZ3d2', $obj->getTitle());
        $this->assertEquals('qyLtPKZnhi', $obj->getDescription());
        $this->assertEquals('gTtfkNgBU3', $obj->getStartParameter());
        $this->assertEquals('eOcAC4v6j1', $obj->getCurrency());
        $this->assertEquals(293105483, $obj->getTotalAmount());
    }

    public function testConstructInvoiceWithAllFields()
    {
        $obj = new Invoice(
            'F0xPEiPtYj',
            '5dRQmHvIyo',
            '0ie6k6PLPG',
            'NlGMzBGJPy',
            789949666
        );
        $this->assertEquals('F0xPEiPtYj', $obj->getTitle());
        $this->assertEquals('5dRQmHvIyo', $obj->getDescription());
        $this->assertEquals('0ie6k6PLPG', $obj->getStartParameter());
        $this->assertEquals('NlGMzBGJPy', $obj->getCurrency());
        $this->assertEquals(789949666, $obj->getTotalAmount());
    }
}
