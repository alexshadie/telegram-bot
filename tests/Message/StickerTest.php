<?php

namespace alexshadie\TelegramBot\Message;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Type\PhotoSizeStub;
use alexshadie\TelegramBot\Sticker\MaskPositionStub;

class StickerTest extends TestCase
{
    public function testConstructStickerWithCommonFields()
    {
        $obj = new Sticker(
            'xnuyzbxzd4',
            858738549,
            1763338494
        );
        $this->assertEquals('xnuyzbxzd4', $obj->getFileId());
        $this->assertEquals(858738549, $obj->getWidth());
        $this->assertEquals(1763338494, $obj->getHeight());
        $this->assertNull($obj->getThumb());
        $this->assertNull($obj->getEmoji());
        $this->assertNull($obj->getSetName());
        $this->assertNull($obj->getMaskPosition());
        $this->assertNull($obj->getFileSize());
    }

    public function testConstructStickerWithAllFields()
    {
        $obj = new Sticker(
            'ArUOcb7Sgf',
            578598905,
            2089105004,
            PhotoSizeStub::getPhotoSizeWithCommonFields2(),
            'ZG42EvzJj0',
            'bah9W8sTTk',
            MaskPositionStub::getMaskPositionWithCommonFields2(),
            37423007
        );
        $this->assertEquals('ArUOcb7Sgf', $obj->getFileId());
        $this->assertEquals(578598905, $obj->getWidth());
        $this->assertEquals(2089105004, $obj->getHeight());
        $this->assertEquals(PhotoSizeStub::getPhotoSizeWithCommonFields2(), $obj->getThumb());
        $this->assertEquals('ZG42EvzJj0', $obj->getEmoji());
        $this->assertEquals('bah9W8sTTk', $obj->getSetName());
        $this->assertEquals(MaskPositionStub::getMaskPositionWithCommonFields2(), $obj->getMaskPosition());
        $this->assertEquals(37423007, $obj->getFileSize());
    }
}
