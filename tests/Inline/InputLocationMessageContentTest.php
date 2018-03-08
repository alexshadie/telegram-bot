<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
class InputLocationMessageContentTest extends TestCase
{
    public function testConstructInputLocationMessageContentWithCommonFields()
    {
        $obj = new InputLocationMessageContent(
            14924210.04,
            5779485.54
        );
        $this->assertEquals(14924210.04, $obj->getLatitude());
        $this->assertEquals(5779485.54, $obj->getLongitude());
        $this->assertNull($obj->getLivePeriod());
    }

    public function testConstructInputLocationMessageContentWithAllFields()
    {
        $obj = new InputLocationMessageContent(
            20401800.15,
            11792363.28,
            1456632145
        );
        $this->assertEquals(20401800.15, $obj->getLatitude());
        $this->assertEquals(11792363.28, $obj->getLongitude());
        $this->assertEquals(1456632145, $obj->getLivePeriod());
    }
}
