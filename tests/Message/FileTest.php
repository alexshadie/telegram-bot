<?php

namespace alexshadie\TelegramBot\Message;

use PHPUnit\Framework\TestCase;
class FileTest extends TestCase
{
    public function testConstructFileWithCommonFields()
    {
        $obj = new File(
            's9sVYQsEa0'
        );
        $this->assertEquals('s9sVYQsEa0', $obj->getFileId());
        $this->assertNull($obj->getFileSize());
        $this->assertNull($obj->getFilePath());
    }

    public function testConstructFileWithAllFields()
    {
        $obj = new File(
            '59aLTORXvU',
            85193715,
            'zfeeaiw8fz'
        );
        $this->assertEquals('59aLTORXvU', $obj->getFileId());
        $this->assertEquals(85193715, $obj->getFileSize());
        $this->assertEquals('zfeeaiw8fz', $obj->getFilePath());
    }
}
