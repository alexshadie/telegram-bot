<?php

namespace alexshadie\TelegramBot\Query;

use PHPUnit\Framework\TestCase;
class ResponseParametersTest extends TestCase
{
    public function testConstructResponseParametersWithCommonFields()
    {
        $obj = new ResponseParameters(

        );
        $this->assertNull($obj->getMigrateToChatId());
        $this->assertNull($obj->getRetryAfter());
    }

    public function testConstructResponseParametersWithAllFields()
    {
        $obj = new ResponseParameters(
            678080221,
            785370952
        );
        $this->assertEquals(678080221, $obj->getMigrateToChatId());
        $this->assertEquals(785370952, $obj->getRetryAfter());
    }
}
