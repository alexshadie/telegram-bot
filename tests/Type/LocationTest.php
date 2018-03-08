<?php

namespace alexshadie\TelegramBot\Type;

use PHPUnit\Framework\TestCase;
class LocationTest extends TestCase
{
    public function testConstructLocationWithCommonFields()
    {
        $obj = new Location(
            339130.45,
            7042942.86
        );
        $this->assertEquals(339130.45, $obj->getLongitude());
        $this->assertEquals(7042942.86, $obj->getLatitude());
    }

    public function testConstructLocationWithAllFields()
    {
        $obj = new Location(
            8128534.56,
            852980.55
        );
        $this->assertEquals(8128534.56, $obj->getLongitude());
        $this->assertEquals(852980.55, $obj->getLatitude());
    }
}
