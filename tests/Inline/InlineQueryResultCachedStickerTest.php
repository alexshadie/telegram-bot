<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultCachedStickerTest extends TestCase
{
    public function testConstructInlineQueryResultCachedStickerWithCommonFields()
    {
        $obj = new InlineQueryResultCachedSticker(
            'r0QBurv5LR',
            'vEfsg267iP',
            'sw0yHXrF68'
        );
        $this->assertEquals('r0QBurv5LR', $obj->getType());
        $this->assertEquals('vEfsg267iP', $obj->getId());
        $this->assertEquals('sw0yHXrF68', $obj->getStickerFileId());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultCachedStickerWithAllFields()
    {
        $obj = new InlineQueryResultCachedSticker(
            'sbPxg54Lh3',
            'FzCUFlNOOj',
            'QHFpK2VnfG',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(),
            InputMessageContentStub::getInputMessageContentWithCommonFields1()
        );
        $this->assertEquals('sbPxg54Lh3', $obj->getType());
        $this->assertEquals('FzCUFlNOOj', $obj->getId());
        $this->assertEquals('QHFpK2VnfG', $obj->getStickerFileId());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields1(), $obj->getInputMessageContent());
    }
}
