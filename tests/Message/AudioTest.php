<?php

namespace alexshadie\TelegramBot\Message;

use PHPUnit\Framework\TestCase;
class AudioTest extends TestCase
{
    public function testConstructAudioWithCommonFields()
    {
        $obj = new Audio(
            'DkXTZKrMvJ',
            1020573670
        );
        $this->assertEquals('DkXTZKrMvJ', $obj->getFileId());
        $this->assertEquals(1020573670, $obj->getDuration());
        $this->assertNull($obj->getPerformer());
        $this->assertNull($obj->getTitle());
        $this->assertNull($obj->getMimeType());
        $this->assertNull($obj->getFileSize());
    }

    public function testConstructAudioWithAllFields()
    {
        $obj = new Audio(
            'Al8RY0FRQH',
            1307156566,
            'QzVE5cGqwc',
            '3XgXGj36fW',
            'legbwJEoCy',
            1482658011
        );
        $this->assertEquals('Al8RY0FRQH', $obj->getFileId());
        $this->assertEquals(1307156566, $obj->getDuration());
        $this->assertEquals('QzVE5cGqwc', $obj->getPerformer());
        $this->assertEquals('3XgXGj36fW', $obj->getTitle());
        $this->assertEquals('legbwJEoCy', $obj->getMimeType());
        $this->assertEquals(1482658011, $obj->getFileSize());
    }
}
