<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Objects\UserStub;
use alexshadie\TelegramBot\Type\LocationStub;

class ChosenInlineResultTest extends TestCase
{
    public function testConstructChosenInlineResultWithCommonFields()
    {
        $obj = new ChosenInlineResult(
            'je4sDdd48n',
            UserStub::getUserWithCommonFields2(),
            'mlzJ3tLHEQ'
        );
        $this->assertEquals('je4sDdd48n', $obj->getResultId());
        $this->assertEquals(UserStub::getUserWithCommonFields2(), $obj->getFrom());
        $this->assertNull($obj->getLocation());
        $this->assertNull($obj->getInlineMessageId());
        $this->assertEquals('mlzJ3tLHEQ', $obj->getQuery());
    }

    public function testConstructChosenInlineResultWithAllFields()
    {
        $obj = new ChosenInlineResult(
            'c8vTGv155M',
            UserStub::getUserWithCommonFields2(),
            'enRQzlS8Og',
            LocationStub::getLocationWithCommonFields3(),
            '2qCSgaS2By'
        );
        $this->assertEquals('c8vTGv155M', $obj->getResultId());
        $this->assertEquals(UserStub::getUserWithCommonFields2(), $obj->getFrom());
        $this->assertEquals(LocationStub::getLocationWithCommonFields3(), $obj->getLocation());
        $this->assertEquals('2qCSgaS2By', $obj->getInlineMessageId());
        $this->assertEquals('enRQzlS8Og', $obj->getQuery());
    }
}
