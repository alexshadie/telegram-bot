<?php

namespace alexshadie\TelegramBot\Payment;

use PHPUnit\Framework\TestCase;
class LabeledPriceTest extends TestCase
{
    public function testConstructLabeledPriceWithCommonFields()
    {
        $obj = new LabeledPrice(
            'PGcWE64qsB',
            38662878
        );
        $this->assertEquals('PGcWE64qsB', $obj->getLabel());
        $this->assertEquals(38662878, $obj->getAmount());
    }

    public function testConstructLabeledPriceWithAllFields()
    {
        $obj = new LabeledPrice(
            'YbSaIh1SI8',
            940842937
        );
        $this->assertEquals('YbSaIh1SI8', $obj->getLabel());
        $this->assertEquals(940842937, $obj->getAmount());
    }
}
