<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
class InputVenueMessageContentTest extends TestCase
{
    public function testConstructInputVenueMessageContentWithCommonFields()
    {
        $obj = new InputVenueMessageContent(
            10492732.66,
            10318616.22,
            '8EPaom8vft',
            'AMn7D9F3xh'
        );
        $this->assertEquals(10492732.66, $obj->getLatitude());
        $this->assertEquals(10318616.22, $obj->getLongitude());
        $this->assertEquals('8EPaom8vft', $obj->getTitle());
        $this->assertEquals('AMn7D9F3xh', $obj->getAddress());
        $this->assertNull($obj->getFoursquareId());
    }

    public function testConstructInputVenueMessageContentWithAllFields()
    {
        $obj = new InputVenueMessageContent(
            16641920.06,
            17741759.73,
            'RHRu016rlL',
            '4k1LDje8gR',
            'nv4kvAEdDG'
        );
        $this->assertEquals(16641920.06, $obj->getLatitude());
        $this->assertEquals(17741759.73, $obj->getLongitude());
        $this->assertEquals('RHRu016rlL', $obj->getTitle());
        $this->assertEquals('4k1LDje8gR', $obj->getAddress());
        $this->assertEquals('nv4kvAEdDG', $obj->getFoursquareId());
    }
}
