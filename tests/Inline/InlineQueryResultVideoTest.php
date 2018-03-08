<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultVideoTest extends TestCase
{
    public function testConstructInlineQueryResultVideoWithCommonFields()
    {
        $obj = new InlineQueryResultVideo(
            'IKV6QM7Te6',
            'DXiWk3mDQa',
            '7PQkFN13bm',
            'tecVNuVZXW',
            'IBWiNRFV9J',
            'liyo2rQ0kb'
        );
        $this->assertEquals('IKV6QM7Te6', $obj->getType());
        $this->assertEquals('DXiWk3mDQa', $obj->getId());
        $this->assertEquals('7PQkFN13bm', $obj->getVideoUrl());
        $this->assertEquals('tecVNuVZXW', $obj->getMimeType());
        $this->assertEquals('IBWiNRFV9J', $obj->getThumbUrl());
        $this->assertEquals('liyo2rQ0kb', $obj->getTitle());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getVideoWidth());
        $this->assertNull($obj->getVideoHeight());
        $this->assertNull($obj->getVideoDuration());
        $this->assertNull($obj->getDescription());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultVideoWithAllFields()
    {
        $obj = new InlineQueryResultVideo(
            'vsEP8iJJ3l',
            '78RY7dCBnl',
            'zgjccfm7Dg',
            'HPsSDoPVAJ',
            'PJ8Jh8axpR',
            'yRgAU7FIMK',
            'yNncrcTtTY',
            'KU6swLqsdD',
            722848155,
            673822771,
            232380872,
            '9hj5rxxGIL',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2()
        );
        $this->assertEquals('vsEP8iJJ3l', $obj->getType());
        $this->assertEquals('78RY7dCBnl', $obj->getId());
        $this->assertEquals('zgjccfm7Dg', $obj->getVideoUrl());
        $this->assertEquals('HPsSDoPVAJ', $obj->getMimeType());
        $this->assertEquals('PJ8Jh8axpR', $obj->getThumbUrl());
        $this->assertEquals('yRgAU7FIMK', $obj->getTitle());
        $this->assertEquals('yNncrcTtTY', $obj->getCaption());
        $this->assertEquals('KU6swLqsdD', $obj->getParseMode());
        $this->assertEquals(722848155, $obj->getVideoWidth());
        $this->assertEquals(673822771, $obj->getVideoHeight());
        $this->assertEquals(232380872, $obj->getVideoDuration());
        $this->assertEquals('9hj5rxxGIL', $obj->getDescription());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields2(), $obj->getInputMessageContent());
    }
}
