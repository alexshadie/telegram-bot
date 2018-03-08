<?php

namespace alexshadie\TelegramBot\Query;

use PHPUnit\Framework\TestCase;
class ForceReplyTest extends TestCase
{
    public function testConstructForceReplyWithCommonFields()
    {
        $obj = new ForceReply(
            false
        );
        $this->assertEquals(false, $obj->getForceReply());
        $this->assertNull($obj->getSelective());
    }

    public function testConstructForceReplyWithAllFields()
    {
        $obj = new ForceReply(
            true,
            false
        );
        $this->assertEquals(true, $obj->getForceReply());
        $this->assertEquals(false, $obj->getSelective());
    }
}
