<?php

namespace alexshadie\TelegramBot\Chat;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Query\MessageStub;

class ChatTest extends TestCase
{
    public function testConstructChatWithCommonFields()
    {
        $obj = new Chat(
            394404172,
            '5YJ1S43nFz'
        );
        $this->assertEquals(394404172, $obj->getId());
        $this->assertEquals('5YJ1S43nFz', $obj->getType());
        $this->assertNull($obj->getTitle());
        $this->assertNull($obj->getUsername());
        $this->assertNull($obj->getFirstName());
        $this->assertNull($obj->getLastName());
        $this->assertNull($obj->getAllMembersAreAdministrators());
        $this->assertNull($obj->getPhoto());
        $this->assertNull($obj->getDescription());
        $this->assertNull($obj->getInviteLink());
        $this->assertNull($obj->getPinnedMessage());
        $this->assertNull($obj->getStickerSetName());
        $this->assertNull($obj->getCanSetStickerSet());
    }

    public function testConstructChatWithAllFields()
    {
        $obj = new Chat(
            1134589737,
            '9blb9AGTXW',
            'vrzywXgD42',
            'UZ4ZhaQOhu',
            'jF8chfU6c0',
            'vRrdaEPa0M',
            true,
            ChatPhotoStub::getChatPhotoWithCommonFields2(),
            'Jca8ODhTMg',
            '6gqrKrTSO0',
            MessageStub::getMessageWithCommonFields2(),
            'wsVSM7CImm',
            true
        );
        $this->assertEquals(1134589737, $obj->getId());
        $this->assertEquals('9blb9AGTXW', $obj->getType());
        $this->assertEquals('vrzywXgD42', $obj->getTitle());
        $this->assertEquals('UZ4ZhaQOhu', $obj->getUsername());
        $this->assertEquals('jF8chfU6c0', $obj->getFirstName());
        $this->assertEquals('vRrdaEPa0M', $obj->getLastName());
        $this->assertEquals(true, $obj->getAllMembersAreAdministrators());
        $this->assertEquals(ChatPhotoStub::getChatPhotoWithCommonFields2(), $obj->getPhoto());
        $this->assertEquals('Jca8ODhTMg', $obj->getDescription());
        $this->assertEquals('6gqrKrTSO0', $obj->getInviteLink());
        $this->assertEquals(MessageStub::getMessageWithCommonFields2(), $obj->getPinnedMessage());
        $this->assertEquals('wsVSM7CImm', $obj->getStickerSetName());
        $this->assertEquals(true, $obj->getCanSetStickerSet());
    }
}
