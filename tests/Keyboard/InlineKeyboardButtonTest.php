<?php

namespace alexshadie\TelegramBot\Keyboard;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Game\CallbackGameStub;

class InlineKeyboardButtonTest extends TestCase
{
    public function testConstructInlineKeyboardButtonWithCommonFields()
    {
        $obj = new InlineKeyboardButton(
            'kLK6H6A5bh'
        );
        $this->assertEquals('kLK6H6A5bh', $obj->getText());
        $this->assertNull($obj->getUrl());
        $this->assertNull($obj->getCallbackData());
        $this->assertNull($obj->getSwitchInlineQuery());
        $this->assertNull($obj->getSwitchInlineQueryCurrentChat());
        $this->assertNull($obj->getCallbackGame());
        $this->assertNull($obj->getPay());
    }

    public function testConstructInlineKeyboardButtonWithAllFields()
    {
        $obj = new InlineKeyboardButton(
            'YzkocQxWij',
            'Lb6Eg1J6He',
            'LK1cIE0KZy',
            'aSOHcbZZnC',
            'PnH1tsFv2R',
            CallbackGameStub::getCallbackGameWithCommonFields1(),
            true
        );
        $this->assertEquals('YzkocQxWij', $obj->getText());
        $this->assertEquals('Lb6Eg1J6He', $obj->getUrl());
        $this->assertEquals('LK1cIE0KZy', $obj->getCallbackData());
        $this->assertEquals('aSOHcbZZnC', $obj->getSwitchInlineQuery());
        $this->assertEquals('PnH1tsFv2R', $obj->getSwitchInlineQueryCurrentChat());
        $this->assertEquals(CallbackGameStub::getCallbackGameWithCommonFields1(), $obj->getCallbackGame());
        $this->assertEquals(true, $obj->getPay());
    }
}
