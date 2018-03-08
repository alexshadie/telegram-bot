<?php

namespace alexshadie\TelegramBot\Chat;

use alexshadie\TelegramBot\Objects\UserStub;

/**
 * Stub for ChatMember class. Use it for testing.
 */
class ChatMemberStub extends ChatMember
{
    /**
     * @return ChatMember
     */
    public static function getChatMemberWithCommonFields1(): ChatMember
    {
        return new ChatMember(
            UserStub::getUserWithCommonFields3(),
            'L95gjGZhdv'
        );
    }
    /**
     * @return ChatMember
     */
    public static function getChatMemberWithCommonFields2(): ChatMember
    {
        return new ChatMember(
            UserStub::getUserWithCommonFields1(),
            'ADB3yVg1ln'
        );
    }
    /**
     * @return ChatMember
     */
    public static function getChatMemberWithCommonFields3(): ChatMember
    {
        return new ChatMember(
            UserStub::getUserWithCommonFields1(),
            'sqGZ2Z9ix0'
        );
    }
    /**
     * @return ChatMember
     */
    public static function getChatMemberWithAllFields1(): ChatMember
    {
        return new ChatMember(
            UserStub::getUserWithCommonFields1(),
            'sJwbchLVQ2',
            1758864738,
            false,
            false,
            false,
            true,
            true,
            false,
            true,
            false,
            true,
            true,
            true,
            false,
            false
        );
    }
    /**
     * @return ChatMember
     */
    public static function getChatMemberWithAllFields2(): ChatMember
    {
        return new ChatMember(
            UserStub::getUserWithCommonFields3(),
            'x62sjCsYP2',
            443591788,
            true,
            true,
            false,
            true,
            false,
            false,
            false,
            true,
            true,
            false,
            false,
            false,
            true
        );
    }
    /**
     * @return ChatMember
     */
    public static function getChatMemberWithAllFields3(): ChatMember
    {
        return new ChatMember(
            UserStub::getUserWithCommonFields2(),
            'FzUWcJCcgD',
            1327324896,
            false,
            false,
            false,
            true,
            false,
            false,
            true,
            false,
            false,
            false,
            false,
            false,
            true
        );
    }
}
