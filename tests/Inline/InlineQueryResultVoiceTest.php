<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultVoiceTest extends TestCase
{
    public function testConstructInlineQueryResultVoiceWithCommonFields()
    {
        $obj = new InlineQueryResultVoice(
            'XFvhGTTmM0',
            'ETZlUMP3LK',
            'lAhdE36K1T',
            'XOMeFLU0KR'
        );
        $this->assertEquals('XFvhGTTmM0', $obj->getType());
        $this->assertEquals('ETZlUMP3LK', $obj->getId());
        $this->assertEquals('lAhdE36K1T', $obj->getVoiceUrl());
        $this->assertEquals('XOMeFLU0KR', $obj->getTitle());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getVoiceDuration());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultVoiceWithAllFields()
    {
        $obj = new InlineQueryResultVoice(
            'E8Yo97FYeR',
            'fyWlIyOEfw',
            'Ts9D4zd6kY',
            '3EXDX3kwFL',
            'n8Zj68KzX8',
            'YBrxLxKjhM',
            1160214455,
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields3()
        );
        $this->assertEquals('E8Yo97FYeR', $obj->getType());
        $this->assertEquals('fyWlIyOEfw', $obj->getId());
        $this->assertEquals('Ts9D4zd6kY', $obj->getVoiceUrl());
        $this->assertEquals('3EXDX3kwFL', $obj->getTitle());
        $this->assertEquals('n8Zj68KzX8', $obj->getCaption());
        $this->assertEquals('YBrxLxKjhM', $obj->getParseMode());
        $this->assertEquals(1160214455, $obj->getVoiceDuration());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields3(), $obj->getInputMessageContent());
    }
}
