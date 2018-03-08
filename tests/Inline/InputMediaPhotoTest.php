<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
class InputMediaPhotoTest extends TestCase
{
    public function testConstructInputMediaPhotoWithCommonFields()
    {
        $obj = new InputMediaPhoto(
            'lrmAOb5nIs',
            'gGaRZHwli4'
        );
        $this->assertEquals('lrmAOb5nIs', $obj->getType());
        $this->assertEquals('gGaRZHwli4', $obj->getMedia());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
    }

    public function testConstructInputMediaPhotoWithAllFields()
    {
        $obj = new InputMediaPhoto(
            'vQwcFDwVs8',
            '4kbhsa8wYq',
            '7dHdQGRQUZ',
            'cYxHpMyYcC'
        );
        $this->assertEquals('vQwcFDwVs8', $obj->getType());
        $this->assertEquals('4kbhsa8wYq', $obj->getMedia());
        $this->assertEquals('7dHdQGRQUZ', $obj->getCaption());
        $this->assertEquals('cYxHpMyYcC', $obj->getParseMode());
    }
}
