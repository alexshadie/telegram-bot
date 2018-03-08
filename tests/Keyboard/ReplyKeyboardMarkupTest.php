<?php

namespace alexshadie\TelegramBot\Keyboard;

use PHPUnit\Framework\TestCase;
class ReplyKeyboardMarkupTest extends TestCase
{
    public function testConstructReplyKeyboardMarkupWithCommonFields()
    {
        $obj = new ReplyKeyboardMarkup(
            [KeyboardButtonStub::getKeyboardButtonWithCommonFields1(), KeyboardButtonStub::getKeyboardButtonWithCommonFields1(), KeyboardButtonStub::getKeyboardButtonWithCommonFields3()]
        );
        $this->assertEquals([KeyboardButtonStub::getKeyboardButtonWithCommonFields1(), KeyboardButtonStub::getKeyboardButtonWithCommonFields1(), KeyboardButtonStub::getKeyboardButtonWithCommonFields3()], $obj->getKeyboard());
        $this->assertNull($obj->getResizeKeyboard());
        $this->assertNull($obj->getOneTimeKeyboard());
        $this->assertNull($obj->getSelective());
    }

    public function testConstructReplyKeyboardMarkupWithAllFields()
    {
        $obj = new ReplyKeyboardMarkup(
            [KeyboardButtonStub::getKeyboardButtonWithCommonFields3(), KeyboardButtonStub::getKeyboardButtonWithCommonFields3()],
            false,
            true,
            true
        );
        $this->assertEquals([KeyboardButtonStub::getKeyboardButtonWithCommonFields3(), KeyboardButtonStub::getKeyboardButtonWithCommonFields3()], $obj->getKeyboard());
        $this->assertEquals(false, $obj->getResizeKeyboard());
        $this->assertEquals(true, $obj->getOneTimeKeyboard());
        $this->assertEquals(true, $obj->getSelective());
    }
}
