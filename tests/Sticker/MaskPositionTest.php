<?php

namespace alexshadie\TelegramBot\Sticker;

use PHPUnit\Framework\TestCase;
class MaskPositionTest extends TestCase
{
    public function testConstructMaskPositionWithCommonFields()
    {
        $obj = new MaskPosition(
            'LAiJTxAB5D',
            9632910.81,
            17116983.93,
            4329887.76
        );
        $this->assertEquals('LAiJTxAB5D', $obj->getPoint());
        $this->assertEquals(9632910.81, $obj->getXShift());
        $this->assertEquals(17116983.93, $obj->getYShift());
        $this->assertEquals(4329887.76, $obj->getScale());
    }

    public function testConstructMaskPositionWithAllFields()
    {
        $obj = new MaskPosition(
            'TArPwe71wL',
            8017907.85,
            17099343.46,
            3488812.23
        );
        $this->assertEquals('TArPwe71wL', $obj->getPoint());
        $this->assertEquals(8017907.85, $obj->getXShift());
        $this->assertEquals(17099343.46, $obj->getYShift());
        $this->assertEquals(3488812.23, $obj->getScale());
    }
}
