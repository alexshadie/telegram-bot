<?php

namespace alexshadie\TelegramBot\Query;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Inline\InlineQueryStub;
use alexshadie\TelegramBot\Inline\ChosenInlineResultStub;
use alexshadie\TelegramBot\Payment\ShippingQueryStub;
use alexshadie\TelegramBot\Payment\PreCheckoutQueryStub;

class UpdateTest extends TestCase
{
    public function testConstructUpdateWithCommonFields()
    {
        $obj = new Update(
            755103476
        );
        $this->assertEquals(755103476, $obj->getUpdateId());
        $this->assertNull($obj->getMessage());
        $this->assertNull($obj->getEditedMessage());
        $this->assertNull($obj->getChannelPost());
        $this->assertNull($obj->getEditedChannelPost());
        $this->assertNull($obj->getInlineQuery());
        $this->assertNull($obj->getChosenInlineResult());
        $this->assertNull($obj->getCallbackQuery());
        $this->assertNull($obj->getShippingQuery());
        $this->assertNull($obj->getPreCheckoutQuery());
    }

    public function testConstructUpdateWithAllFields()
    {
        $obj = new Update(
            294891820,
            MessageStub::getMessageWithCommonFields2(),
            MessageStub::getMessageWithCommonFields2(),
            MessageStub::getMessageWithCommonFields3(),
            MessageStub::getMessageWithCommonFields2(),
            InlineQueryStub::getInlineQueryWithCommonFields1(),
            ChosenInlineResultStub::getChosenInlineResultWithCommonFields2(),
            CallbackQueryStub::getCallbackQueryWithCommonFields2(),
            ShippingQueryStub::getShippingQueryWithCommonFields2(),
            PreCheckoutQueryStub::getPreCheckoutQueryWithCommonFields1()
        );
        $this->assertEquals(294891820, $obj->getUpdateId());
        $this->assertEquals(MessageStub::getMessageWithCommonFields2(), $obj->getMessage());
        $this->assertEquals(MessageStub::getMessageWithCommonFields2(), $obj->getEditedMessage());
        $this->assertEquals(MessageStub::getMessageWithCommonFields3(), $obj->getChannelPost());
        $this->assertEquals(MessageStub::getMessageWithCommonFields2(), $obj->getEditedChannelPost());
        $this->assertEquals(InlineQueryStub::getInlineQueryWithCommonFields1(), $obj->getInlineQuery());
        $this->assertEquals(ChosenInlineResultStub::getChosenInlineResultWithCommonFields2(), $obj->getChosenInlineResult());
        $this->assertEquals(CallbackQueryStub::getCallbackQueryWithCommonFields2(), $obj->getCallbackQuery());
        $this->assertEquals(ShippingQueryStub::getShippingQueryWithCommonFields2(), $obj->getShippingQuery());
        $this->assertEquals(PreCheckoutQueryStub::getPreCheckoutQueryWithCommonFields1(), $obj->getPreCheckoutQuery());
    }
}
