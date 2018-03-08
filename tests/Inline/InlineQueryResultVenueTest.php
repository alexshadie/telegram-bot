<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultVenueTest extends TestCase
{
    public function testConstructInlineQueryResultVenueWithCommonFields()
    {
        $obj = new InlineQueryResultVenue(
            'fOI8mSxJtp',
            'dRssqAWVhy',
            1935984.95,
            5818619.68,
            'oVPct2MlJ2',
            'knfWMn3kPQ'
        );
        $this->assertEquals('fOI8mSxJtp', $obj->getType());
        $this->assertEquals('dRssqAWVhy', $obj->getId());
        $this->assertEquals(1935984.95, $obj->getLatitude());
        $this->assertEquals(5818619.68, $obj->getLongitude());
        $this->assertEquals('oVPct2MlJ2', $obj->getTitle());
        $this->assertEquals('knfWMn3kPQ', $obj->getAddress());
        $this->assertNull($obj->getFoursquareId());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
        $this->assertNull($obj->getThumbUrl());
        $this->assertNull($obj->getThumbWidth());
        $this->assertNull($obj->getThumbHeight());
    }

    public function testConstructInlineQueryResultVenueWithAllFields()
    {
        $obj = new InlineQueryResultVenue(
            'HYgy6RKloo',
            '9j1ItJMD17',
            12687184.01,
            3335835.4,
            'TWC8wAO3lh',
            '3hvLuVDICx',
            'S9WKbP3xW9',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(),
            InputMessageContentStub::getInputMessageContentWithCommonFields3(),
            'MmrcHiUtGr',
            1962948505,
            2082363697
        );
        $this->assertEquals('HYgy6RKloo', $obj->getType());
        $this->assertEquals('9j1ItJMD17', $obj->getId());
        $this->assertEquals(12687184.01, $obj->getLatitude());
        $this->assertEquals(3335835.4, $obj->getLongitude());
        $this->assertEquals('TWC8wAO3lh', $obj->getTitle());
        $this->assertEquals('3hvLuVDICx', $obj->getAddress());
        $this->assertEquals('S9WKbP3xW9', $obj->getFoursquareId());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields3(), $obj->getInputMessageContent());
        $this->assertEquals('MmrcHiUtGr', $obj->getThumbUrl());
        $this->assertEquals(1962948505, $obj->getThumbWidth());
        $this->assertEquals(2082363697, $obj->getThumbHeight());
    }
}
