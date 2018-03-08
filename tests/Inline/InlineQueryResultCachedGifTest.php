<?php

namespace alexshadie\TelegramBot\Inline;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkupStub;

class InlineQueryResultCachedGifTest extends TestCase
{
    public function testConstructInlineQueryResultCachedGifWithCommonFields()
    {
        $obj = new InlineQueryResultCachedGif(
            'kHigoWViwb',
            'GHFBSKPAjA',
            'Z2p8PYlg4t'
        );
        $this->assertEquals('kHigoWViwb', $obj->getType());
        $this->assertEquals('GHFBSKPAjA', $obj->getId());
        $this->assertEquals('Z2p8PYlg4t', $obj->getGifFileId());
        $this->assertNull($obj->getTitle());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getParseMode());
        $this->assertNull($obj->getReplyMarkup());
        $this->assertNull($obj->getInputMessageContent());
    }

    public function testConstructInlineQueryResultCachedGifWithAllFields()
    {
        $obj = new InlineQueryResultCachedGif(
            'Q92O2nDF8J',
            'bUSXqtKy2n',
            'Fe1VtdLnNE',
            'TsV3HHU5GP',
            'GxmYyT7FgU',
            '63aTn0545D',
            InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(),
            InputMessageContentStub::getInputMessageContentWithCommonFields3()
        );
        $this->assertEquals('Q92O2nDF8J', $obj->getType());
        $this->assertEquals('bUSXqtKy2n', $obj->getId());
        $this->assertEquals('Fe1VtdLnNE', $obj->getGifFileId());
        $this->assertEquals('TsV3HHU5GP', $obj->getTitle());
        $this->assertEquals('GxmYyT7FgU', $obj->getCaption());
        $this->assertEquals('63aTn0545D', $obj->getParseMode());
        $this->assertEquals(InlineKeyboardMarkupStub::getInlineKeyboardMarkupWithCommonFields1(), $obj->getReplyMarkup());
        $this->assertEquals(InputMessageContentStub::getInputMessageContentWithCommonFields3(), $obj->getInputMessageContent());
    }
}
