<?php

namespace alexshadie\TelegramBot\Objects;

use PHPUnit\Framework\TestCase;
class MessageEntityTest extends TestCase
{
    public function testConstructMessageEntityWithCommonFields()
    {
        $obj = new MessageEntity(
            'hkXpqicOJP',
            1374373387,
            913338093
        );
        $this->assertEquals('hkXpqicOJP', $obj->getType());
        $this->assertEquals(1374373387, $obj->getOffset());
        $this->assertEquals(913338093, $obj->getLength());
        $this->assertNull($obj->getUrl());
        $this->assertNull($obj->getUser());
    }

    public function testConstructMessageEntityWithAllFields()
    {
        $obj = new MessageEntity(
            'K42TJDGpNF',
            847383446,
            2102831278,
            'ybYmuIGvxD',
            UserStub::getUserWithCommonFields1()
        );
        $this->assertEquals('K42TJDGpNF', $obj->getType());
        $this->assertEquals(847383446, $obj->getOffset());
        $this->assertEquals(2102831278, $obj->getLength());
        $this->assertEquals('ybYmuIGvxD', $obj->getUrl());
        $this->assertEquals(UserStub::getUserWithCommonFields1(), $obj->getUser());
    }
}
