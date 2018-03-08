<?php

namespace alexshadie\TelegramBot\Message;

use PHPUnit\Framework\TestCase;
class ContactTest extends TestCase
{
    public function testConstructContactWithCommonFields()
    {
        $obj = new Contact(
            '5kfMNHQVUm',
            'Rit0mEBVG0'
        );
        $this->assertEquals('5kfMNHQVUm', $obj->getPhoneNumber());
        $this->assertEquals('Rit0mEBVG0', $obj->getFirstName());
        $this->assertNull($obj->getLastName());
        $this->assertNull($obj->getUserId());
    }

    public function testConstructContactWithAllFields()
    {
        $obj = new Contact(
            '0SBRUqovns',
            'eNFnMNZp5V',
            'xf4wINPl42',
            1379190321
        );
        $this->assertEquals('0SBRUqovns', $obj->getPhoneNumber());
        $this->assertEquals('eNFnMNZp5V', $obj->getFirstName());
        $this->assertEquals('xf4wINPl42', $obj->getLastName());
        $this->assertEquals(1379190321, $obj->getUserId());
    }
}
