<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultLocationTest extends TestCase
{
    public function testConstructInlineQueryResultLocationWithCommonFields()
    {
        $obj = new InlineQueryResultLocation(
            '426PYwwDJf',
            'V8AEbgwAvM',
            5353481.69,
            18769624.3,
            'zfgS1Dtwa6'
        );
        $this->assertEquals('426PYwwDJf', $obj->getType());
        $this->assertEquals('V8AEbgwAvM', $obj->getId());
        $this->assertEquals(5353481.69, $obj->getLatitude());
        $this->assertEquals(18769624.3, $obj->getLongitude());
        $this->assertEquals('zfgS1Dtwa6', $obj->getTitle());
        $this->assertNull($obj->getLivePeriod());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
        $this->assertNull($obj->getThumbUrl());
        $this->assertNull($obj->getThumbWidth());
        $this->assertNull($obj->getThumbHeight());
    }

    public function testConstructInlineQueryResultLocationWithAllFields()
    {
        $obj = new InlineQueryResultLocation(
            'BppsPwqCPi',
            '9FucJa5HTD',
            5248568.17,
            8977963.99,
            'IF9uydBwfU',
            908967341,
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2(),
            'C41dABaBEe',
            1799201730,
            2047892483
        );
        $this->assertEquals('BppsPwqCPi', $obj->getType());
        $this->assertEquals('9FucJa5HTD', $obj->getId());
        $this->assertEquals(5248568.17, $obj->getLatitude());
        $this->assertEquals(8977963.99, $obj->getLongitude());
        $this->assertEquals('IF9uydBwfU', $obj->getTitle());
        $this->assertEquals(908967341, $obj->getLivePeriod());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields2(), $obj->getInputMessageContent());
        $this->assertEquals('C41dABaBEe', $obj->getThumbUrl());
        $this->assertEquals(1799201730, $obj->getThumbWidth());
        $this->assertEquals(2047892483, $obj->getThumbHeight());
    }
}
