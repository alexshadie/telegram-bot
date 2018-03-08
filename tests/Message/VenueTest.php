<?php

namespace alexshadie\TelegramBot\Message;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Type\LocationStub;

class VenueTest extends TestCase
{
    public function testConstructVenueWithCommonFields()
    {
        $obj = new Venue(
            LocationStub::getLocationWithCommonFields3(),
            'xwBBB79Cek',
            'J2PJ20LjOF'
        );
        $this->assertEquals(LocationStub::getLocationWithCommonFields3(), $obj->getLocation());
        $this->assertEquals('xwBBB79Cek', $obj->getTitle());
        $this->assertEquals('J2PJ20LjOF', $obj->getAddress());
        $this->assertNull($obj->getFoursquareId());
    }

    public function testConstructVenueWithAllFields()
    {
        $obj = new Venue(
            LocationStub::getLocationWithCommonFields3(),
            'XwUZulTCBf',
            'lmzInipUbi',
            'b4QQlWmrQq'
        );
        $this->assertEquals(LocationStub::getLocationWithCommonFields3(), $obj->getLocation());
        $this->assertEquals('XwUZulTCBf', $obj->getTitle());
        $this->assertEquals('lmzInipUbi', $obj->getAddress());
        $this->assertEquals('b4QQlWmrQq', $obj->getFoursquareId());
    }
}
