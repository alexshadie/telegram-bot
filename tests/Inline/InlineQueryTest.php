<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Objects\UserStub;
use alexshadie\TelegramBot\Type\LocationStub;

class InlineQueryTest extends TestCase
{
    public function testConstructInlineQueryWithCommonFields()
    {
        $obj = new InlineQuery(
            'Cxl8L0rW6D',
            UserStub::getUserWithCommonFields3(),
            'eqBGzSTHkO',
            'SP0HvzsJbw'
        );
        $this->assertEquals('Cxl8L0rW6D', $obj->getId());
        $this->assertEquals(UserStub::getUserWithCommonFields3(), $obj->getFrom());
        $this->assertNull($obj->getLocation());
        $this->assertEquals('eqBGzSTHkO', $obj->getQuery());
        $this->assertEquals('SP0HvzsJbw', $obj->getOffset());
    }

    public function testConstructInlineQueryWithAllFields()
    {
        $obj = new InlineQuery(
            'rnK86mjHpw',
            UserStub::getUserWithCommonFields1(),
            'nrIwB6OL9S',
            'KBqIRCMDUv',
            LocationStub::getLocationWithCommonFields1()
        );
        $this->assertEquals('rnK86mjHpw', $obj->getId());
        $this->assertEquals(UserStub::getUserWithCommonFields1(), $obj->getFrom());
        $this->assertEquals(LocationStub::getLocationWithCommonFields1(), $obj->getLocation());
        $this->assertEquals('nrIwB6OL9S', $obj->getQuery());
        $this->assertEquals('KBqIRCMDUv', $obj->getOffset());
    }
}
