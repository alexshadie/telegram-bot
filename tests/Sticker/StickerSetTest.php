<?php

namespace alexshadie\TelegramBot\Sticker;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Message\StickerStub;

class StickerSetTest extends TestCase
{
    public function testConstructStickerSetWithCommonFields()
    {
        $obj = new StickerSet(
            'vIFC5cMIN5',
            'Y6lm2qrIJW',
            false,
            [StickerStub::getStickerWithCommonFields2()]
        );
        $this->assertEquals('vIFC5cMIN5', $obj->getName());
        $this->assertEquals('Y6lm2qrIJW', $obj->getTitle());
        $this->assertEquals(false, $obj->getContainsMasks());
        $this->assertEquals([StickerStub::getStickerWithCommonFields2()], $obj->getStickers());
    }

    public function testConstructStickerSetWithAllFields()
    {
        $obj = new StickerSet(
            'yJOAp2Tkyh',
            'LlrqOXDvcE',
            true,
            [StickerStub::getStickerWithCommonFields1(), StickerStub::getStickerWithCommonFields1(), StickerStub::getStickerWithCommonFields1()]
        );
        $this->assertEquals('yJOAp2Tkyh', $obj->getName());
        $this->assertEquals('LlrqOXDvcE', $obj->getTitle());
        $this->assertEquals(true, $obj->getContainsMasks());
        $this->assertEquals([StickerStub::getStickerWithCommonFields1(), StickerStub::getStickerWithCommonFields1(), StickerStub::getStickerWithCommonFields1()], $obj->getStickers());
    }
}
