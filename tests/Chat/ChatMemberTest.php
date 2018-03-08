<?php

namespace alexshadie\TelegramBot\Chat;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Objects\UserStub;

class ChatMemberTest extends TestCase
{
    public function testConstructChatMemberWithCommonFields()
    {
        $obj = new ChatMember(
            UserStub::getUserWithCommonFields3(),
            'AmjndvitcO'
        );
        $this->assertEquals(UserStub::getUserWithCommonFields3(), $obj->getUser());
        $this->assertEquals('AmjndvitcO', $obj->getStatus());
        $this->assertNull($obj->getUntilDate());
        $this->assertNull($obj->getCanBeEdited());
        $this->assertNull($obj->getCanChangeInfo());
        $this->assertNull($obj->getCanPostMessages());
        $this->assertNull($obj->getCanEditMessages());
        $this->assertNull($obj->getCanDeleteMessages());
        $this->assertNull($obj->getCanInviteUsers());
        $this->assertNull($obj->getCanRestrictMembers());
        $this->assertNull($obj->getCanPinMessages());
        $this->assertNull($obj->getCanPromoteMembers());
        $this->assertNull($obj->getCanSendMessages());
        $this->assertNull($obj->getCanSendMediaMessages());
        $this->assertNull($obj->getCanSendOtherMessages());
        $this->assertNull($obj->getCanAddWebPagePreviews());
    }

    public function testConstructChatMemberWithAllFields()
    {
        $obj = new ChatMember(
            UserStub::getUserWithCommonFields2(),
            'RcCDFAkPUY',
            981151977,
            true,
            true,
            false,
            false,
            false,
            true,
            true,
            true,
            true,
            false,
            false,
            true,
            false
        );
        $this->assertEquals(UserStub::getUserWithCommonFields2(), $obj->getUser());
        $this->assertEquals('RcCDFAkPUY', $obj->getStatus());
        $this->assertEquals(981151977, $obj->getUntilDate());
        $this->assertEquals(true, $obj->getCanBeEdited());
        $this->assertEquals(true, $obj->getCanChangeInfo());
        $this->assertEquals(false, $obj->getCanPostMessages());
        $this->assertEquals(false, $obj->getCanEditMessages());
        $this->assertEquals(false, $obj->getCanDeleteMessages());
        $this->assertEquals(true, $obj->getCanInviteUsers());
        $this->assertEquals(true, $obj->getCanRestrictMembers());
        $this->assertEquals(true, $obj->getCanPinMessages());
        $this->assertEquals(true, $obj->getCanPromoteMembers());
        $this->assertEquals(false, $obj->getCanSendMessages());
        $this->assertEquals(false, $obj->getCanSendMediaMessages());
        $this->assertEquals(true, $obj->getCanSendOtherMessages());
        $this->assertEquals(false, $obj->getCanAddWebPagePreviews());
    }
}
