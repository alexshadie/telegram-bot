<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultCachedVideoTest extends TestCase
{
    public function testConstructInlineQueryResultCachedVideoWithCommonFields()
    {
        $obj = new InlineQueryResultCachedVideo(
            'URwYN9iRki',
            'SKcWLn4GuK',
            'HcyX3PdSvc',
            '0JrYyXOidB'
        );
        $this->assertEquals('URwYN9iRki', $obj->getType());
        $this->assertEquals('SKcWLn4GuK', $obj->getId());
        $this->assertEquals('HcyX3PdSvc', $obj->getVideoFileId());
        $this->assertEquals('0JrYyXOidB', $obj->getTitle());
        $this->assertNull($obj->getDescription());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultCachedVideoWithAllFields()
    {
        $obj = new InlineQueryResultCachedVideo(
            'YlRzhcZxE9',
            '1pkirvq69z',
            'QDWaEKHElW',
            '2fqmeiuMAv',
            'EDcHPUdMXl',
            'VWFLd9n9oT',
            'RAk9XmYBQi',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(),
            InputMessageContentStub::getInputMessageContentWithCommonFields1()
        );
        $this->assertEquals('YlRzhcZxE9', $obj->getType());
        $this->assertEquals('1pkirvq69z', $obj->getId());
        $this->assertEquals('QDWaEKHElW', $obj->getVideoFileId());
        $this->assertEquals('2fqmeiuMAv', $obj->getTitle());
        $this->assertEquals('EDcHPUdMXl', $obj->getDescription());
        $this->assertEquals('VWFLd9n9oT', $obj->getCaption());
        $this->assertEquals('RAk9XmYBQi', $obj->getParseMode());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields1(), $obj->getInputMessageContent());
    }
}
