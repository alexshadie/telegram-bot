<?php

namespace alexshadie\TelegramBot\Keyboard;

use PHPUnit\Framework\TestCase;
class ReplyKeyboardRemoveTest extends TestCase
{
    public function testConstructReplyKeyboardRemoveWithCommonFields()
    {
        $obj = new ReplyKeyboardRemove(
            false
        );
        $this->assertEquals(false, $obj->getRemoveKeyboard());
        $this->assertNull($obj->getSelective());
    }

    public function testConstructReplyKeyboardRemoveWithAllFields()
    {
        $obj = new ReplyKeyboardRemove(
            true,
            true
        );
        $this->assertEquals(true, $obj->getRemoveKeyboard());
        $this->assertEquals(true, $obj->getSelective());
    }
}
