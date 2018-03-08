<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultCachedAudioTest extends TestCase
{
    public function testConstructInlineQueryResultCachedAudioWithCommonFields()
    {
        $obj = new InlineQueryResultCachedAudio(
            'I9Kn18QJNl',
            'oei1LMZS8A',
            'xOW4ktJUH5'
        );
        $this->assertEquals('I9Kn18QJNl', $obj->getType());
        $this->assertEquals('oei1LMZS8A', $obj->getId());
        $this->assertEquals('xOW4ktJUH5', $obj->getAudioFileId());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultCachedAudioWithAllFields()
    {
        $obj = new InlineQueryResultCachedAudio(
            'h8rrC8Ep0e',
            'JQ8ktRbecM',
            '8hsIoNPgpm',
            'abXQrAfzmP',
            'Swt5sexlUd',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields3()
        );
        $this->assertEquals('h8rrC8Ep0e', $obj->getType());
        $this->assertEquals('JQ8ktRbecM', $obj->getId());
        $this->assertEquals('8hsIoNPgpm', $obj->getAudioFileId());
        $this->assertEquals('abXQrAfzmP', $obj->getCaption());
        $this->assertEquals('Swt5sexlUd', $obj->getParseMode());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields3(), $obj->getInputMessageContent());
    }
}
