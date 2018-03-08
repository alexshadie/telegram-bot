<?php

namespace alexshadie\TelegramBot\Type;

use PHPUnit\Framework\TestCase;
class PhotoSizeTest extends TestCase
{
    public function testConstructPhotoSizeWithCommonFields()
    {
        $obj = new PhotoSize(
            'ApRUhvVfvz',
            1115717594,
            1049363782
        );
        $this->assertEquals('ApRUhvVfvz', $obj->getFileId());
        $this->assertEquals(1115717594, $obj->getWidth());
        $this->assertEquals(1049363782, $obj->getHeight());
        $this->assertNull($obj->getFileSize());
    }

    public function testConstructPhotoSizeWithAllFields()
    {
        $obj = new PhotoSize(
            'TOoidFpZQK',
            2062241382,
            1158057326,
            618565170
        );
        $this->assertEquals('TOoidFpZQK', $obj->getFileId());
        $this->assertEquals(2062241382, $obj->getWidth());
        $this->assertEquals(1158057326, $obj->getHeight());
        $this->assertEquals(618565170, $obj->getFileSize());
    }
}
