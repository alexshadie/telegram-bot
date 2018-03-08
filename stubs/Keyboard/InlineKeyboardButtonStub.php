<?php

namespace alexshadie\TelegramBot\Keyboard;

use alexshadie\TelegramBot\Game\CallbackGameStub;

/**
 * Stub for InlineKeyboardButton class. Use it for testing.
 */
class InlineKeyboardButtonStub extends InlineKeyboardButton
{
    /**
     * @return InlineKeyboardButton
     */
    public static function getInlineKeyboardButtonWithCommonFields1(): InlineKeyboardButton
    {
        return new InlineKeyboardButton(
            'BbNEYMcUNS'
        );
    }
    /**
     * @return InlineKeyboardButton
     */
    public static function getInlineKeyboardButtonWithCommonFields2(): InlineKeyboardButton
    {
        return new InlineKeyboardButton(
            'WYeaAVkA9K'
        );
    }
    /**
     * @return InlineKeyboardButton
     */
    public static function getInlineKeyboardButtonWithCommonFields3(): InlineKeyboardButton
    {
        return new InlineKeyboardButton(
            '2HjwcsNs8X'
        );
    }
    /**
     * @return InlineKeyboardButton
     */
    public static function getInlineKeyboardButtonWithAllFields1(): InlineKeyboardButton
    {
        return new InlineKeyboardButton(
            '262g3Yemtl',
            'A35MCnp2cb',
            'hbVtSxuLrA',
            '9Pu89kkLk7',
            'sSUNkfMDlq',
            CallbackGameStub::getCallbackGameWithCommonFields3(),
            false
        );
    }
    /**
     * @return InlineKeyboardButton
     */
    public static function getInlineKeyboardButtonWithAllFields2(): InlineKeyboardButton
    {
        return new InlineKeyboardButton(
            'xB0urnR5VC',
            'xuyTqBP6tk',
            'HqummvIe94',
            'cQFuSH1M6t',
            'qAXMiOoEB5',
            CallbackGameStub::getCallbackGameWithCommonFields1(),
            true
        );
    }
    /**
     * @return InlineKeyboardButton
     */
    public static function getInlineKeyboardButtonWithAllFields3(): InlineKeyboardButton
    {
        return new InlineKeyboardButton(
            'BIlMtXWsYv',
            'hU9JOiIpw7',
            'h6wwSJfRzp',
            'b2SlVcV2Gk',
            'p4hFu93KNs',
            CallbackGameStub::getCallbackGameWithCommonFields1(),
            true
        );
    }
}
