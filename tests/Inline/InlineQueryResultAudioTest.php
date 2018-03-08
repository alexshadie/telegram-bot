<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultAudioTest extends TestCase
{
    public function testConstructInlineQueryResultAudioWithCommonFields()
    {
        $obj = new InlineQueryResultAudio(
            'U5TBd1JzfX',
            'Bmj4bEVAVR',
            '5nFP2YaC4Q',
            'kn9Gz6aNBR'
        );
        $this->assertEquals('U5TBd1JzfX', $obj->getType());
        $this->assertEquals('Bmj4bEVAVR', $obj->getId());
        $this->assertEquals('5nFP2YaC4Q', $obj->getAudioUrl());
        $this->assertEquals('kn9Gz6aNBR', $obj->getTitle());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getPerformer());
        $this->assertNull($obj->getAudioDuration());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultAudioWithAllFields()
    {
        $obj = new InlineQueryResultAudio(
            'PFAsgOVNhR',
            'OWmFzdFVqM',
            'JK16R7lrlS',
            'AOU2FpigWN',
            'UjmCgfY032',
            'IFe1CQvduX',
            'WSQ7r1KfNc',
            1955120580,
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(),
            InputMessageContentStub::getInputMessageContentWithCommonFields2()
        );
        $this->assertEquals('PFAsgOVNhR', $obj->getType());
        $this->assertEquals('OWmFzdFVqM', $obj->getId());
        $this->assertEquals('JK16R7lrlS', $obj->getAudioUrl());
        $this->assertEquals('AOU2FpigWN', $obj->getTitle());
        $this->assertEquals('UjmCgfY032', $obj->getCaption());
        $this->assertEquals('IFe1CQvduX', $obj->getParseMode());
        $this->assertEquals('WSQ7r1KfNc', $obj->getPerformer());
        $this->assertEquals(1955120580, $obj->getAudioDuration());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields2(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields2(), $obj->getInputMessageContent());
    }
}
