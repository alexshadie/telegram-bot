<?php

namespace alexshadie\TelegramBot\Keyboard;

use PHPUnit\Framework\TestCase;
class InlineKeyboardMarkupTest extends TestCase
{
    public function testConstructInlineKeyboardMarkupWithCommonFields()
    {
        $obj = new InlineKeyboardMarkup(
            [InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields1(), InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields1(), InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields2()]
        );
        $this->assertEquals([InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields1(), InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields1(), InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields2()], $obj->getInlineKeyboard());
    }

    public function testConstructInlineKeyboardMarkupWithAllFields()
    {
        $obj = new InlineKeyboardMarkup(
            [InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields3(), InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields1()]
        );
        $this->assertEquals([InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields3(), InlineKeyboardButtonStub::getInlineKeyboardButtonWithCommonFields1()], $obj->getInlineKeyboard());
    }
}
