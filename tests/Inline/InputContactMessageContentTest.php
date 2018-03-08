<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
class InputContactMessageContentTest extends TestCase
{
    public function testConstructInputContactMessageContentWithCommonFields()
    {
        $obj = new InputContactMessageContent(
            'GL4HfP1bKP',
            'DgzcH5MfjE'
        );
        $this->assertEquals('GL4HfP1bKP', $obj->getPhoneNumber());
        $this->assertEquals('DgzcH5MfjE', $obj->getFirstName());
        $this->assertNull($obj->getLastName());
    }

    public function testConstructInputContactMessageContentWithAllFields()
    {
        $obj = new InputContactMessageContent(
            'c1szYst9N6',
            'oYJutKbdAz',
            'lSkPmMboHq'
        );
        $this->assertEquals('c1szYst9N6', $obj->getPhoneNumber());
        $this->assertEquals('oYJutKbdAz', $obj->getFirstName());
        $this->assertEquals('lSkPmMboHq', $obj->getLastName());
    }
}
