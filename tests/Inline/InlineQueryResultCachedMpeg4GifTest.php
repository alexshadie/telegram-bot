<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultCachedMpeg4GifTest extends TestCase
{
    public function testConstructInlineQueryResultCachedMpeg4GifWithCommonFields()
    {
        $obj = new InlineQueryResultCachedMpeg4Gif(
            'pG0ymr1RdS',
            'jfSW1mYW33',
            'Ct5439KUe9'
        );
        $this->assertEquals('pG0ymr1RdS', $obj->getType());
        $this->assertEquals('jfSW1mYW33', $obj->getId());
        $this->assertEquals('Ct5439KUe9', $obj->getMpeg4FileId());
        $this->assertNull($obj->getTitle());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultCachedMpeg4GifWithAllFields()
    {
        $obj = new InlineQueryResultCachedMpeg4Gif(
            'XMnbQv5Va3',
            'gFQciSsLhh',
            '0ggFpLF7aE',
            '19OHKycK5O',
            '63GOoXmarf',
            'gY6zMItreh',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields3()
        );
        $this->assertEquals('XMnbQv5Va3', $obj->getType());
        $this->assertEquals('gFQciSsLhh', $obj->getId());
        $this->assertEquals('0ggFpLF7aE', $obj->getMpeg4FileId());
        $this->assertEquals('19OHKycK5O', $obj->getTitle());
        $this->assertEquals('63GOoXmarf', $obj->getCaption());
        $this->assertEquals('gY6zMItreh', $obj->getParseMode());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields3(), $obj->getInputMessageContent());
    }
}
