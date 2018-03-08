<?php

namespace alexshadie\TelegramBot\Objects;

use PHPUnit\Framework\TestCase;
class UserTest extends TestCase
{
    public function testConstructUserWithCommonFields()
    {
        $obj = new User(
            488394990,
            true,
            'i1cAMNgINi'
        );
        $this->assertEquals(488394990, $obj->getId());
        $this->assertEquals(true, $obj->getIsBot());
        $this->assertEquals('i1cAMNgINi', $obj->getFirstName());
        $this->assertNull($obj->getLastName());
        $this->assertNull($obj->getUsername());
        $this->assertNull($obj->getLanguageCode());
    }

    public function testConstructUserWithAllFields()
    {
        $obj = new User(
            1135910806,
            true,
            'gBlgzQpep5',
            '2T2jMk1Pzy',
            '0pT0BgFTCw',
            'Hi3BJScJJa'
        );
        $this->assertEquals(1135910806, $obj->getId());
        $this->assertEquals(true, $obj->getIsBot());
        $this->assertEquals('gBlgzQpep5', $obj->getFirstName());
        $this->assertEquals('2T2jMk1Pzy', $obj->getLastName());
        $this->assertEquals('0pT0BgFTCw', $obj->getUsername());
        $this->assertEquals('Hi3BJScJJa', $obj->getLanguageCode());
    }
}
