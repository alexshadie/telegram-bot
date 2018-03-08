<?php

namespace alexshadie\TelegramBot\Keyboard;

use PHPUnit\Framework\TestCase;
class KeyboardButtonTest extends TestCase
{
    public function testConstructKeyboardButtonWithCommonFields()
    {
        $obj = new KeyboardButton(
            'zlQbxR4Xt5'
        );
        $this->assertEquals('zlQbxR4Xt5', $obj->getText());
        $this->assertNull($obj->getRequestContact());
        $this->assertNull($obj->getRequestLocation());
    }

    public function testConstructKeyboardButtonWithAllFields()
    {
        $obj = new KeyboardButton(
            '706ODGjgRt',
            true,
            true
        );
        $this->assertEquals('706ODGjgRt', $obj->getText());
        $this->assertEquals(true, $obj->getRequestContact());
        $this->assertEquals(true, $obj->getRequestLocation());
    }
}
