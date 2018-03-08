<?php

namespace alexshadie\TelegramBot\Bot\Exception;

use PHPUnit\Framework\TestCase;

class TelegramResponseExceptionTest extends TestCase
{

    public function testObject()
    {
        $ex = new TelegramResponseException();
        $this->assertEquals("", $ex->getMessage());
        $this->assertEquals(0, $ex->getCode());
        $this->assertEquals(null, $ex->getRawData());
        $this->assertEquals(null, $ex->getPrevious());
        $this->assertEquals("TelegramResponseException: 0 - '' (NULL)", $ex->__toString());

        $ex = new TelegramResponseException("message");
        $this->assertEquals("message", $ex->getMessage());
        $this->assertEquals(0, $ex->getCode());
        $this->assertEquals(null, $ex->getRawData());
        $this->assertEquals(null, $ex->getPrevious());

        $ex = new TelegramResponseException("message", 101);
        $this->assertEquals($ex->getMessage(), "message");
        $this->assertEquals(101, $ex->getCode());
        $this->assertEquals(null, $ex->getRawData());
        $this->assertEquals(null, $ex->getPrevious());

        $ex = new TelegramResponseException("message", 101, json_decode('{"test":"data"}'));
        $this->assertEquals($ex->getMessage(), "message");
        $this->assertEquals(101, $ex->getCode());
        $this->assertEquals(json_decode('{"test":"data"}'), $ex->getRawData());
        $this->assertEquals(null, $ex->getPrevious());

        $prev = new \Exception("test");
        $ex = new TelegramResponseException("message", 101, null, $prev);
        $this->assertEquals($ex->getMessage(), "message");
        $this->assertEquals(101, $ex->getCode());
        $this->assertEquals(null, $ex->getRawData());
        $this->assertEquals($prev, $ex->getPrevious());
    }
}
