<?php

namespace alexshadie\TelegramBot\Chat;

use PHPUnit\Framework\TestCase;
class ChatPhotoTest extends TestCase
{
    public function testConstructChatPhotoWithCommonFields()
    {
        $obj = new ChatPhoto(
            '6pMMLWFrAZ',
            'S74E4v1HFA'
        );
        $this->assertEquals('6pMMLWFrAZ', $obj->getSmallFileId());
        $this->assertEquals('S74E4v1HFA', $obj->getBigFileId());
    }

    public function testConstructChatPhotoWithAllFields()
    {
        $obj = new ChatPhoto(
            'ed4lFjzA0X',
            'd4PSgG5Bwx'
        );
        $this->assertEquals('ed4lFjzA0X', $obj->getSmallFileId());
        $this->assertEquals('d4PSgG5Bwx', $obj->getBigFileId());
    }
}
