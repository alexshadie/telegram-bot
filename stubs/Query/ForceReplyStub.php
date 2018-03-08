<?php

namespace alexshadie\TelegramBot\Query;


/**
 * Stub for ForceReply class. Use it for testing.
 */
class ForceReplyStub extends ForceReply
{
    /**
     * @return ForceReply
     */
    public static function getForceReplyWithCommonFields1(): ForceReply
    {
        return new ForceReply(
            false
        );
    }
    /**
     * @return ForceReply
     */
    public static function getForceReplyWithCommonFields2(): ForceReply
    {
        return new ForceReply(
            false
        );
    }
    /**
     * @return ForceReply
     */
    public static function getForceReplyWithCommonFields3(): ForceReply
    {
        return new ForceReply(
            true
        );
    }
    /**
     * @return ForceReply
     */
    public static function getForceReplyWithAllFields1(): ForceReply
    {
        return new ForceReply(
            true,
            true
        );
    }
    /**
     * @return ForceReply
     */
    public static function getForceReplyWithAllFields2(): ForceReply
    {
        return new ForceReply(
            false,
            true
        );
    }
    /**
     * @return ForceReply
     */
    public static function getForceReplyWithAllFields3(): ForceReply
    {
        return new ForceReply(
            false,
            true
        );
    }
}
