<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultMpeg4GifTest extends TestCase
{
    public function testConstructInlineQueryResultMpeg4GifWithCommonFields()
    {
        $obj = new InlineQueryResultMpeg4Gif(
            'yTQSNE51xf',
            'ihizR9TvnG',
            'nZ9nVWlCrG',
            'r6lx79UII1'
        );
        $this->assertEquals('yTQSNE51xf', $obj->getType());
        $this->assertEquals('ihizR9TvnG', $obj->getId());
        $this->assertEquals('nZ9nVWlCrG', $obj->getMpeg4Url());
        $this->assertNull($obj->getMpeg4Width());
        $this->assertNull($obj->getMpeg4Height());
        $this->assertNull($obj->getMpeg4Duration());
        $this->assertEquals('r6lx79UII1', $obj->getThumbUrl());
        $this->assertNull($obj->getTitle());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultMpeg4GifWithAllFields()
    {
        $obj = new InlineQueryResultMpeg4Gif(
            'LZSKhU8mdD',
            'LSLNbMCL3a',
            'iE4qGQokAV',
            '329F8AWJuZ',
            1984878309,
            1460623233,
            1409412393,
            'hQwNMoKGAM',
            '3z7CwamoEd',
            'n06ucxM5j8',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2()
        );
        $this->assertEquals('LZSKhU8mdD', $obj->getType());
        $this->assertEquals('LSLNbMCL3a', $obj->getId());
        $this->assertEquals('iE4qGQokAV', $obj->getMpeg4Url());
        $this->assertEquals(1984878309, $obj->getMpeg4Width());
        $this->assertEquals(1460623233, $obj->getMpeg4Height());
        $this->assertEquals(1409412393, $obj->getMpeg4Duration());
        $this->assertEquals('329F8AWJuZ', $obj->getThumbUrl());
        $this->assertEquals('hQwNMoKGAM', $obj->getTitle());
        $this->assertEquals('3z7CwamoEd', $obj->getCaption());
        $this->assertEquals('n06ucxM5j8', $obj->getParseMode());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields2(), $obj->getInputMessageContent());
    }
}
