<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultArticleTest extends TestCase
{
    public function testConstructInlineQueryResultArticleWithCommonFields()
    {
        $obj = new InlineQueryResultArticle(
            '3xrYI9eb90',
            'bgveS3fLPy',
            'dP5qf1Sl1w',
            InputMessageContentStub::getInputMessageContentWithCommonFields2()
        );
        $this->assertEquals('3xrYI9eb90', $obj->getType());
        $this->assertEquals('bgveS3fLPy', $obj->getId());
        $this->assertEquals('dP5qf1Sl1w', $obj->getTitle());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields2(), $obj->getInputMessageContent());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getUrl());
        $this->assertNull($obj->getHideUrl());
        $this->assertNull($obj->getDescription());
        $this->assertNull($obj->getThumbUrl());
        $this->assertNull($obj->getThumbWidth());
        $this->assertNull($obj->getThumbHeight());
    }

    public function testConstructInlineQueryResultArticleWithAllFields()
    {
        $obj = new InlineQueryResultArticle(
            '7vh7cQ86MO',
            'a1LwM1HDgi',
            'VX3kBm89Y9',
            InputMessageContentStub::getInputMessageContentWithCommonFields1(),
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(),
            'VwZn4aJ0eq',
            false,
            'caS6eXgqPr',
            'qvy4gwOkvz',
            1885985221,
            943313258
        );
        $this->assertEquals('7vh7cQ86MO', $obj->getType());
        $this->assertEquals('a1LwM1HDgi', $obj->getId());
        $this->assertEquals('VX3kBm89Y9', $obj->getTitle());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields1(), $obj->getInputMessageContent());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(), $obj->getReplyMarkup());
        $this->assertEquals('VwZn4aJ0eq', $obj->getUrl());
        $this->assertEquals(false, $obj->getHideUrl());
        $this->assertEquals('caS6eXgqPr', $obj->getDescription());
        $this->assertEquals('qvy4gwOkvz', $obj->getThumbUrl());
        $this->assertEquals(1885985221, $obj->getThumbWidth());
        $this->assertEquals(943313258, $obj->getThumbHeight());
    }
}
