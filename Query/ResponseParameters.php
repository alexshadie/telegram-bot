<?php

namespace alexshadie\TelegramBot\query;

use alexshadie\TelegramBot\objects\Object;

/**
 * Class ResponseParameters
 * Содержит информацию о том, почему запрос не был успешен.
 * @package telegram
 */
class ResponseParameters extends Object
{
    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier. T
     * his number may be greater than 32 bits and some programming languages may have difficulty/silent
     * defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision
     * float type are safe for storing this identifier.
     * @var int|null
     */
    private $migrate_to_chat_id;
    /**
     * Optional. In case of exceeding flood control, the number of seconds left to wait before the request can be repeated
     * @var int|null
     */
    private $retry_after;
}