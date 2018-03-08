<?php

namespace alexshadie\TelegramBot\Message;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Type\PhotoSizeStub;

class VideoTest extends TestCase
{
    public function testConstructVideoWithCommonFields()
    {
        $obj = new Video(
            'Ss2ZGTax2U',
            1202761188,
            1827604423,
            424516496
        );
        $this->assertEquals('Ss2ZGTax2U', $obj->getFileId());
        $this->assertEquals(1202761188, $obj->getWidth());
        $this->assertEquals(1827604423, $obj->getHeight());
        $this->assertEquals(424516496, $obj->getDuration());
        $this->assertNull($obj->getThumb());
        $this->assertNull($obj->getMimeType());
        $this->assertNull($obj->getFileSize());
    }

    public function testConstructVideoWithAllFields()
    {
        $obj = new Video(
            'dXU44AqFjU',
            1046821023,
            1166283260,
            1958845859,
            PhotoSizeStub::getPhotoSizeWithCommonFields2(),
            '6YIknvqBT8',
            2078888632
        );
        $this->assertEquals('dXU44AqFjU', $obj->getFileId());
        $this->assertEquals(1046821023, $obj->getWidth());
        $this->assertEquals(1166283260, $obj->getHeight());
        $this->assertEquals(1958845859, $obj->getDuration());
        $this->assertEquals(PhotoSizeStub::getPhotoSizeWithCommonFields2(), $obj->getThumb());
        $this->assertEquals('6YIknvqBT8', $obj->getMimeType());
        $this->assertEquals(2078888632, $obj->getFileSize());
    }
}
