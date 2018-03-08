<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
class InputTextMessageContentTest extends TestCase
{
    public function testConstructInputTextMessageContentWithCommonFields()
    {
        $obj = new InputTextMessageContent(
            '3cKAf5wElF'
        );
        $this->assertEquals('3cKAf5wElF', $obj->getMessageText());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getDisableWebPagePreview());
    }

    public function testConstructInputTextMessageContentWithAllFields()
    {
        $obj = new InputTextMessageContent(
            'r9MGU6lXhw',
            'jJu02VzKLq',
            false
        );
        $this->assertEquals('r9MGU6lXhw', $obj->getMessageText());
        $this->assertEquals('jJu02VzKLq', $obj->getParseMode());
        $this->assertEquals(false, $obj->getDisableWebPagePreview());
    }
}
