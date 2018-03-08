<?php

namespace alexshadie\TelegramBot\Message;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Type\PhotoSizeStub;

class VideoNoteTest extends TestCase
{
    public function testConstructVideoNoteWithCommonFields()
    {
        $obj = new VideoNote(
            'Lyh8bLHggL',
            1790869863,
            1342154339
        );
        $this->assertEquals('Lyh8bLHggL', $obj->getFileId());
        $this->assertEquals(1790869863, $obj->getLength());
        $this->assertEquals(1342154339, $obj->getDuration());
        $this->assertNull($obj->getThumb());
        $this->assertNull($obj->getFileSize());
    }

    public function testConstructVideoNoteWithAllFields()
    {
        $obj = new VideoNote(
            'MCWp5ZN5Vs',
            1069032904,
            2015617907,
            PhotoSizeStub::getPhotoSizeWithCommonFields3(),
            576130222
        );
        $this->assertEquals('MCWp5ZN5Vs', $obj->getFileId());
        $this->assertEquals(1069032904, $obj->getLength());
        $this->assertEquals(2015617907, $obj->getDuration());
        $this->assertEquals(PhotoSizeStub::getPhotoSizeWithCommonFields3(), $obj->getThumb());
        $this->assertEquals(576130222, $obj->getFileSize());
    }
}
