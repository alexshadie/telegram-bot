<?php

namespace alexshadie\TelegramBot\Query;

use alexshadie\TelegramBot\Inline\InlineQueryStub;
use alexshadie\TelegramBot\Inline\ChosenInlineResultStub;
use alexshadie\TelegramBot\Payment\ShippingQueryStub;
use alexshadie\TelegramBot\Payment\PreCheckoutQueryStub;

/**
 * Stub for Update class. Use it for testing.
 */
class UpdateStub extends Update
{
    /**
     * @return Update
     */
    public static function getUpdateWithCommonFields1(): Update
    {
        return new Update(
            1659106174
        );
    }
    /**
     * @return Update
     */
    public static function getUpdateWithCommonFields2(): Update
    {
        return new Update(
            247027391
        );
    }
    /**
     * @return Update
     */
    public static function getUpdateWithCommonFields3(): Update
    {
        return new Update(
            1054464647
        );
    }
    /**
     * @return Update
     */
    public static function getUpdateWithAllFields1(): Update
    {
        return new Update(
            67258100,
            MessageStub::getMessageWithCommonFields1(),
            MessageStub::getMessageWithCommonFields3(),
            MessageStub::getMessageWithCommonFields1(),
            MessageStub::getMessageWithCommonFields2(),
            InlineQueryStub::getInlineQueryWithCommonFields1(),
            ChosenInlineResultStub::getChosenInlineResultWithCommonFields1(),
            CallbackQueryStub::getCallbackQueryWithCommonFields1(),
            ShippingQueryStub::getShippingQueryWithCommonFields1(),
            PreCheckoutQueryStub::getPreCheckoutQueryWithCommonFields2()
        );
    }
    /**
     * @return Update
     */
    public static function getUpdateWithAllFields2(): Update
    {
        return new Update(
            1456552221,
            MessageStub::getMessageWithCommonFields1(),
            MessageStub::getMessageWithCommonFields2(),
            MessageStub::getMessageWithCommonFields3(),
            MessageStub::getMessageWithCommonFields3(),
            InlineQueryStub::getInlineQueryWithCommonFields3(),
            ChosenInlineResultStub::getChosenInlineResultWithCommonFields3(),
            CallbackQueryStub::getCallbackQueryWithCommonFields3(),
            ShippingQueryStub::getShippingQueryWithCommonFields3(),
            PreCheckoutQueryStub::getPreCheckoutQueryWithCommonFields1()
        );
    }
    /**
     * @return Update
     */
    public static function getUpdateWithAllFields3(): Update
    {
        return new Update(
            583950625,
            MessageStub::getMessageWithCommonFields2(),
            MessageStub::getMessageWithCommonFields1(),
            MessageStub::getMessageWithCommonFields1(),
            MessageStub::getMessageWithCommonFields3(),
            InlineQueryStub::getInlineQueryWithCommonFields1(),
            ChosenInlineResultStub::getChosenInlineResultWithCommonFields2(),
            CallbackQueryStub::getCallbackQueryWithCommonFields2(),
            ShippingQueryStub::getShippingQueryWithCommonFields3(),
            PreCheckoutQueryStub::getPreCheckoutQueryWithCommonFields1()
        );
    }
}
