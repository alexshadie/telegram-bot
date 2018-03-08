<?php

namespace alexshadie\TelegramBot\Query;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Objects\UserStub;

class CallbackQueryTest extends TestCase
{
    public function testConstructCallbackQueryWithCommonFields()
    {
        $obj = new CallbackQuery(
            'MjvOs7oay7',
            UserStub::getUserWithCommonFields2(),
            '9RfeoNMhMn'
        );
        $this->assertEquals('MjvOs7oay7', $obj->getId());
        $this->assertEquals(UserStub::getUserWithCommonFields2(), $obj->getFrom());
        $this->assertNull($obj->getMessage());
        $this->assertNull($obj->getInlineMessageId());
        $this->assertEquals('9RfeoNMhMn', $obj->getChatInstance());
        $this->assertNull($obj->getData());
        $this->assertNull($obj->getGameShortName());
    }

    public function testConstructCallbackQueryWithAllFields()
    {
        $obj = new CallbackQuery(
            'y9i2bJpIfO',
            UserStub::getUserWithCommonFields1(),
            'xSXhOF5DGs',
            MessageStub::getMessageWithCommonFields1(),
            've31uKtoCH',
            'VnSoho54TZ',
            'ZUrsgRpW4q'
        );
        $this->assertEquals('y9i2bJpIfO', $obj->getId());
        $this->assertEquals(UserStub::getUserWithCommonFields1(), $obj->getFrom());
        $this->assertEquals(MessageStub::getMessageWithCommonFields1(), $obj->getMessage());
        $this->assertEquals('ve31uKtoCH', $obj->getInlineMessageId());
        $this->assertEquals('xSXhOF5DGs', $obj->getChatInstance());
        $this->assertEquals('VnSoho54TZ', $obj->getData());
        $this->assertEquals('ZUrsgRpW4q', $obj->getGameShortName());
    }
}
