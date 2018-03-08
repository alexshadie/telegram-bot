<?php

namespace alexshadie\TelegramBot\Message;

use PHPUnit\Framework\TestCase;
class VoiceTest extends TestCase
{
    public function testConstructVoiceWithCommonFields()
    {
        $obj = new Voice(
            'MxZ2h33rVg',
            1670652402
        );
        $this->assertEquals('MxZ2h33rVg', $obj->getFileId());
        $this->assertEquals(1670652402, $obj->getDuration());
        $this->assertNull($obj->getMimeType());
        $this->assertNull($obj->getFileSize());
    }

    public function testConstructVoiceWithAllFields()
    {
        $obj = new Voice(
            'empTx7P6Rz',
            181818027,
            'DieQvc9qCC',
            981040821
        );
        $this->assertEquals('empTx7P6Rz', $obj->getFileId());
        $this->assertEquals(181818027, $obj->getDuration());
        $this->assertEquals('DieQvc9qCC', $obj->getMimeType());
        $this->assertEquals(981040821, $obj->getFileSize());
    }
}
