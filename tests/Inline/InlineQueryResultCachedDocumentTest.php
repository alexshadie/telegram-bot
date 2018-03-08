<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultCachedDocumentTest extends TestCase
{
    public function testConstructInlineQueryResultCachedDocumentWithCommonFields()
    {
        $obj = new InlineQueryResultCachedDocument(
            '3N7qqAt4bn',
            'NXMrU1PT9X',
            '6FXFEmICam',
            'QCtJhAL5HU'
        );
        $this->assertEquals('3N7qqAt4bn', $obj->getType());
        $this->assertEquals('NXMrU1PT9X', $obj->getId());
        $this->assertEquals('6FXFEmICam', $obj->getTitle());
        $this->assertEquals('QCtJhAL5HU', $obj->getDocumentFileId());
        $this->assertNull($obj->getDescription());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultCachedDocumentWithAllFields()
    {
        $obj = new InlineQueryResultCachedDocument(
            '9fLwuiWlPY',
            'aNfKisGAZS',
            'Shki7eJqYr',
            'wD2ZNtx16C',
            'u3xc8N0QIt',
            'xnDk1ZpXAJ',
            'BNF4oC1xK3',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(),
            InputMessageContentStub::getInputMessageContentWithCommonFields1()
        );
        $this->assertEquals('9fLwuiWlPY', $obj->getType());
        $this->assertEquals('aNfKisGAZS', $obj->getId());
        $this->assertEquals('Shki7eJqYr', $obj->getTitle());
        $this->assertEquals('wD2ZNtx16C', $obj->getDocumentFileId());
        $this->assertEquals('u3xc8N0QIt', $obj->getDescription());
        $this->assertEquals('xnDk1ZpXAJ', $obj->getCaption());
        $this->assertEquals('BNF4oC1xK3', $obj->getParseMode());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields1(), $obj->getInputMessageContent());
    }
}
