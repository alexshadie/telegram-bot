<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultCachedPhotoTest extends TestCase
{
    public function testConstructInlineQueryResultCachedPhotoWithCommonFields()
    {
        $obj = new InlineQueryResultCachedPhoto(
            'AqKVbyU9T1',
            'TsLpimVkCH',
            '4vyIiOn6qU'
        );
        $this->assertEquals('AqKVbyU9T1', $obj->getType());
        $this->assertEquals('TsLpimVkCH', $obj->getId());
        $this->assertEquals('4vyIiOn6qU', $obj->getPhotoFileId());
        $this->assertNull($obj->getTitle());
        $this->assertNull($obj->getDescription());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultCachedPhotoWithAllFields()
    {
        $obj = new InlineQueryResultCachedPhoto(
            'Uc9mP8LqhM',
            'xlja9X1MPq',
            'oVpIEf1PiT',
            '8o0C2nt5pi',
            'DWmvb6m54E',
            'PfjHrBrFhK',
            'BnuozGInyp',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(),
            InputMessageContentStub::getInputMessageContentWithCommonFields3()
        );
        $this->assertEquals('Uc9mP8LqhM', $obj->getType());
        $this->assertEquals('xlja9X1MPq', $obj->getId());
        $this->assertEquals('oVpIEf1PiT', $obj->getPhotoFileId());
        $this->assertEquals('8o0C2nt5pi', $obj->getTitle());
        $this->assertEquals('DWmvb6m54E', $obj->getDescription());
        $this->assertEquals('PfjHrBrFhK', $obj->getCaption());
        $this->assertEquals('BnuozGInyp', $obj->getParseMode());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields3(), $obj->getInputMessageContent());
    }
}
