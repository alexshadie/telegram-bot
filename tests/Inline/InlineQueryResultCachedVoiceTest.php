<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultCachedVoiceTest extends TestCase
{
    public function testConstructInlineQueryResultCachedVoiceWithCommonFields()
    {
        $obj = new InlineQueryResultCachedVoice(
            'hPJjLNZt9B',
            'CRsc8OnyCB',
            'HqQKbDcekQ',
            '7C8GanbT1g'
        );
        $this->assertEquals('hPJjLNZt9B', $obj->getType());
        $this->assertEquals('CRsc8OnyCB', $obj->getId());
        $this->assertEquals('HqQKbDcekQ', $obj->getVoiceFileId());
        $this->assertEquals('7C8GanbT1g', $obj->getTitle());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultCachedVoiceWithAllFields()
    {
        $obj = new InlineQueryResultCachedVoice(
            'jfmJYKmJkd',
            '0eIQtIbzsw',
            'ckdKUZIeIh',
            'sVmkn9P6Fs',
            'oV5PX0AnUN',
            'ndNxhogjGC',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2()
        );
        $this->assertEquals('jfmJYKmJkd', $obj->getType());
        $this->assertEquals('0eIQtIbzsw', $obj->getId());
        $this->assertEquals('ckdKUZIeIh', $obj->getVoiceFileId());
        $this->assertEquals('sVmkn9P6Fs', $obj->getTitle());
        $this->assertEquals('oV5PX0AnUN', $obj->getCaption());
        $this->assertEquals('ndNxhogjGC', $obj->getParseMode());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields2(), $obj->getInputMessageContent());
    }
}
