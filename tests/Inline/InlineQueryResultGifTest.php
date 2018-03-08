<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultGifTest extends TestCase
{
    public function testConstructInlineQueryResultGifWithCommonFields()
    {
        $obj = new InlineQueryResultGif(
            '9uKrZKnGBj',
            '6IKTyz1IH0',
            'hbhj9fkD8B',
            '4Yy2KLjcHD'
        );
        $this->assertEquals('9uKrZKnGBj', $obj->getType());
        $this->assertEquals('6IKTyz1IH0', $obj->getId());
        $this->assertEquals('hbhj9fkD8B', $obj->getGifUrl());
        $this->assertNull($obj->getGifWidth());
        $this->assertNull($obj->getGifHeight());
        $this->assertNull($obj->getGifDuration());
        $this->assertEquals('4Yy2KLjcHD', $obj->getThumbUrl());
        $this->assertNull($obj->getTitle());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultGifWithAllFields()
    {
        $obj = new InlineQueryResultGif(
            'EREJaM6l6E',
            'PCajApT4lI',
            'ncdW2HV0oQ',
            'ak3AnD0dAo',
            1747642096,
            695687655,
            178613564,
            'uElVF0g7Iy',
            'RR2dDcJ0Lx',
            'kBtybmlHUF',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields3()
        );
        $this->assertEquals('EREJaM6l6E', $obj->getType());
        $this->assertEquals('PCajApT4lI', $obj->getId());
        $this->assertEquals('ncdW2HV0oQ', $obj->getGifUrl());
        $this->assertEquals(1747642096, $obj->getGifWidth());
        $this->assertEquals(695687655, $obj->getGifHeight());
        $this->assertEquals(178613564, $obj->getGifDuration());
        $this->assertEquals('ak3AnD0dAo', $obj->getThumbUrl());
        $this->assertEquals('uElVF0g7Iy', $obj->getTitle());
        $this->assertEquals('RR2dDcJ0Lx', $obj->getCaption());
        $this->assertEquals('kBtybmlHUF', $obj->getParseMode());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields3(), $obj->getInputMessageContent());
    }
}
