<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
class InputMediaVideoTest extends TestCase
{
    public function testConstructInputMediaVideoWithCommonFields()
    {
        $obj = new InputMediaVideo(
            'jaXNrUdJRM',
            'GAmsYxc2S2'
        );
        $this->assertEquals('jaXNrUdJRM', $obj->getType());
        $this->assertEquals('GAmsYxc2S2', $obj->getMedia());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getWidth());
        $this->assertNull($obj->getHeight());
        $this->assertNull($obj->getDuration());
        $this->assertNull($obj->getSupportsStreaming());
    }

    public function testConstructInputMediaVideoWithAllFields()
    {
        $obj = new InputMediaVideo(
            'BVi1D90K0m',
            'wLlJrlpWlS',
            'vnX78oM3Ld',
            'gG4mHR0JWp',
            1977500226,
            561912269,
            2022552307,
            false
        );
        $this->assertEquals('BVi1D90K0m', $obj->getType());
        $this->assertEquals('wLlJrlpWlS', $obj->getMedia());
        $this->assertEquals('vnX78oM3Ld', $obj->getCaption());
        $this->assertEquals('gG4mHR0JWp', $obj->getParseMode());
        $this->assertEquals(1977500226, $obj->getWidth());
        $this->assertEquals(561912269, $obj->getHeight());
        $this->assertEquals(2022552307, $obj->getDuration());
        $this->assertEquals(false, $obj->getSupportsStreaming());
    }
}
