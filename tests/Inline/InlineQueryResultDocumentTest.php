<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultDocumentTest extends TestCase
{
    public function testConstructInlineQueryResultDocumentWithCommonFields()
    {
        $obj = new InlineQueryResultDocument(
            'fYBK2Ew3QL',
            '44Lt4zwWC8',
            'iLZswqL42v',
            'x4q80D6QKc',
            'dwFVkROU6f'
        );
        $this->assertEquals('fYBK2Ew3QL', $obj->getType());
        $this->assertEquals('44Lt4zwWC8', $obj->getId());
        $this->assertEquals('iLZswqL42v', $obj->getTitle());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertEquals('x4q80D6QKc', $obj->getDocumentUrl());
        $this->assertEquals('dwFVkROU6f', $obj->getMimeType());
        $this->assertNull($obj->getDescription());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
        $this->assertNull($obj->getThumbUrl());
        $this->assertNull($obj->getThumbWidth());
        $this->assertNull($obj->getThumbHeight());
    }

    public function testConstructInlineQueryResultDocumentWithAllFields()
    {
        $obj = new InlineQueryResultDocument(
            'hvbS4BUf3o',
            'KABpKofSyD',
            'tL8wYOOZBP',
            'zuqljffQWs',
            '7Nxo4djWB1',
            'HyizhWE5Bp',
            'U8Dj0pE7yM',
            'iH6CgGwW7E',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(),
            InputMessageContentStub::getInputMessageContentWithCommonFields1(),
            'ojNuiirNDg',
            889299503,
            1695445386
        );
        $this->assertEquals('hvbS4BUf3o', $obj->getType());
        $this->assertEquals('KABpKofSyD', $obj->getId());
        $this->assertEquals('tL8wYOOZBP', $obj->getTitle());
        $this->assertEquals('HyizhWE5Bp', $obj->getCaption());
        $this->assertEquals('U8Dj0pE7yM', $obj->getParseMode());
        $this->assertEquals('zuqljffQWs', $obj->getDocumentUrl());
        $this->assertEquals('7Nxo4djWB1', $obj->getMimeType());
        $this->assertEquals('iH6CgGwW7E', $obj->getDescription());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields1(), $obj->getInputMessageContent());
        $this->assertEquals('ojNuiirNDg', $obj->getThumbUrl());
        $this->assertEquals(889299503, $obj->getThumbWidth());
        $this->assertEquals(1695445386, $obj->getThumbHeight());
    }
}
