<?php

namespace alexshadie\TelegramBot\Objects;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Type\PhotoSizeStub;

class UserProfilePhotosTest extends TestCase
{
    public function testConstructUserProfilePhotosWithCommonFields()
    {
        $obj = new UserProfilePhotos(
            127797632,
            [PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields1()]
        );
        $this->assertEquals(127797632, $obj->getTotalCount());
        $this->assertEquals([PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields1()], $obj->getPhotos());
    }

    public function testConstructUserProfilePhotosWithAllFields()
    {
        $obj = new UserProfilePhotos(
            287124668,
            [PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields1()]
        );
        $this->assertEquals(287124668, $obj->getTotalCount());
        $this->assertEquals([PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields1()], $obj->getPhotos());
    }
}
