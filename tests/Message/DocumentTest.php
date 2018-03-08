<?php

namespace alexshadie\TelegramBot\Message;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Type\PhotoSizeStub;

class DocumentTest extends TestCase
{
    public function testConstructDocumentWithCommonFields()
    {
        $obj = new Document(
            '5efzCm8LsK'
        );
        $this->assertEquals('5efzCm8LsK', $obj->getFileId());
        $this->assertNull($obj->getThumb());
        $this->assertNull($obj->getFileName());
        $this->assertNull($obj->getMimeType());
        $this->assertNull($obj->getFileSize());
    }

    public function testConstructDocumentWithAllFields()
    {
        $obj = new Document(
            '9jbryRX2Oa',
            PhotoSizeStub::getPhotoSizeWithCommonFields2(),
            '2UpE9tv5Bf',
            'SaFyUSyc5G',
            1688475918
        );
        $this->assertEquals('9jbryRX2Oa', $obj->getFileId());
        $this->assertEquals(PhotoSizeStub::getPhotoSizeWithCommonFields2(), $obj->getThumb());
        $this->assertEquals('2UpE9tv5Bf', $obj->getFileName());
        $this->assertEquals('SaFyUSyc5G', $obj->getMimeType());
        $this->assertEquals(1688475918, $obj->getFileSize());
    }
}
