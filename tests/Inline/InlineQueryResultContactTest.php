<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultContactTest extends TestCase
{
    public function testConstructInlineQueryResultContactWithCommonFields()
    {
        $obj = new InlineQueryResultContact(
            'COQTOFntrK',
            'ZB7F9VDqFD',
            'vQ46PWGhKb',
            'tLFCaQhiif'
        );
        $this->assertEquals('COQTOFntrK', $obj->getType());
        $this->assertEquals('ZB7F9VDqFD', $obj->getId());
        $this->assertEquals('vQ46PWGhKb', $obj->getPhoneNumber());
        $this->assertEquals('tLFCaQhiif', $obj->getFirstName());
        $this->assertNull($obj->getLastName());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
        $this->assertNull($obj->getThumbUrl());
        $this->assertNull($obj->getThumbWidth());
        $this->assertNull($obj->getThumbHeight());
    }

    public function testConstructInlineQueryResultContactWithAllFields()
    {
        $obj = new InlineQueryResultContact(
            'aQWgvODU7V',
            'e71bKZ6HAx',
            'G1BcwzViMl',
            'AsAgZysUUq',
            'QqzELwbjUU',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2(),
            '3jbP1yWWiE',
            2134656100,
            496179450
        );
        $this->assertEquals('aQWgvODU7V', $obj->getType());
        $this->assertEquals('e71bKZ6HAx', $obj->getId());
        $this->assertEquals('G1BcwzViMl', $obj->getPhoneNumber());
        $this->assertEquals('AsAgZysUUq', $obj->getFirstName());
        $this->assertEquals('QqzELwbjUU', $obj->getLastName());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields2(), $obj->getInputMessageContent());
        $this->assertEquals('3jbP1yWWiE', $obj->getThumbUrl());
        $this->assertEquals(2134656100, $obj->getThumbWidth());
        $this->assertEquals(496179450, $obj->getThumbHeight());
    }
}
