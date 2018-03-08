<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultGameTest extends TestCase
{
    public function testConstructInlineQueryResultGameWithCommonFields()
    {
        $obj = new InlineQueryResultGame(
            'UPonpkpJpN',
            'iGA3f2bje3',
            'HOTzTVJGFB'
        );
        $this->assertEquals('UPonpkpJpN', $obj->getType());
        $this->assertEquals('iGA3f2bje3', $obj->getId());
        $this->assertEquals('HOTzTVJGFB', $obj->getGameShortName());
        $this->assertNull($obj->getReplyMarkup());
    }

    public function testConstructInlineQueryResultGameWithAllFields()
    {
        $obj = new InlineQueryResultGame(
            'uDplS30Fzp',
            'kSo9XQGEkr',
            '2GOOmPZxxV',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2()
        );
        $this->assertEquals('uDplS30Fzp', $obj->getType());
        $this->assertEquals('kSo9XQGEkr', $obj->getId());
        $this->assertEquals('2GOOmPZxxV', $obj->getGameShortName());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(), $obj->getReplyMarkup());
    }
}
