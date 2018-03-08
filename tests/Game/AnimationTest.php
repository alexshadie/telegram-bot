<?php

namespace alexshadie\TelegramBot\Game;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Type\PhotoSizeStub;

class AnimationTest extends TestCase
{
    public function testConstructAnimationWithCommonFields()
    {
        $obj = new Animation(
            'XdRfr40kGf'
        );
        $this->assertEquals('XdRfr40kGf', $obj->getFileId());
        $this->assertNull($obj->getThumb());
        $this->assertNull($obj->getFileName());
        $this->assertNull($obj->getMimeType());
        $this->assertNull($obj->getFileSize());
    }

    public function testConstructAnimationWithAllFields()
    {
        $obj = new Animation(
            'PQqZPgl1g5',
            PhotoSizeStub::getPhotoSizeWithCommonFields1(),
            'LCqJ5svP5a',
            '4dHWzLeyas',
            423345145
        );
        $this->assertEquals('PQqZPgl1g5', $obj->getFileId());
        $this->assertEquals(PhotoSizeStub::getPhotoSizeWithCommonFields1(), $obj->getThumb());
        $this->assertEquals('LCqJ5svP5a', $obj->getFileName());
        $this->assertEquals('4dHWzLeyas', $obj->getMimeType());
        $this->assertEquals(423345145, $obj->getFileSize());
    }
}
