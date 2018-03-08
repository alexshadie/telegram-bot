<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultPhotoTest extends TestCase
{
    public function testConstructInlineQueryResultPhotoWithCommonFields()
    {
        $obj = new InlineQueryResultPhoto(
            'YM50RfeFuz',
            'Muvrs2b3cg',
            'uyRxCyfAgO',
            'ThsodNMLGN'
        );
        $this->assertEquals('YM50RfeFuz', $obj->getType());
        $this->assertEquals('Muvrs2b3cg', $obj->getId());
        $this->assertEquals('uyRxCyfAgO', $obj->getPhotoUrl());
        $this->assertEquals('ThsodNMLGN', $obj->getThumbUrl());
        $this->assertNull($obj->getPhotoWidth());
        $this->assertNull($obj->getPhotoHeight());
        $this->assertNull($obj->getTitle());
        $this->assertNull($obj->getDescription());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultPhotoWithAllFields()
    {
        $obj = new InlineQueryResultPhoto(
            'f3udKD7pAy',
            'LQ140H5Jsm',
            'TZMx914hL3',
            'gqlp2nwBpP',
            1265369449,
            1330636658,
            'YZ4ftbrptV',
            'SK8FJJHjpV',
            'xuOZLryNwk',
            'YDBCjMLDw6',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2()
        );
        $this->assertEquals('f3udKD7pAy', $obj->getType());
        $this->assertEquals('LQ140H5Jsm', $obj->getId());
        $this->assertEquals('TZMx914hL3', $obj->getPhotoUrl());
        $this->assertEquals('gqlp2nwBpP', $obj->getThumbUrl());
        $this->assertEquals(1265369449, $obj->getPhotoWidth());
        $this->assertEquals(1330636658, $obj->getPhotoHeight());
        $this->assertEquals('YZ4ftbrptV', $obj->getTitle());
        $this->assertEquals('SK8FJJHjpV', $obj->getDescription());
        $this->assertEquals('xuOZLryNwk', $obj->getCaption());
        $this->assertEquals('YDBCjMLDw6', $obj->getParseMode());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields3(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields2(), $obj->getInputMessageContent());
    }
}
