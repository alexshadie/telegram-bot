<?php

namespace alexshadie\TelegramBot\Query;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Inline\InlineQuery;
use alexshadie\TelegramBot\Inline\ChosenInlineResult;
use alexshadie\TelegramBot\Payment\ShippingQuery;
use alexshadie\TelegramBot\Payment\PreCheckoutQuery;

/**
 * This object represents an incoming update.
 *
 * At most one of the optional parameters can be present in any given update.
 *
 */
class Update extends Object
{
    /**
     * The update‘s unique identifier. Update identifiers start from a certain positive number and increase sequentially.
     * This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates or to
     * restore the correct update sequence, should they get out of order. If there are no new updates for at least a week,
     * then identifier of the next update will be chosen randomly instead of sequentially.
     *
     * @var int
     */
    private $update_id;

    /**
     * New incoming message of any kind — text, photo, sticker, etc.
     *
     * @var Message|null
     */
    private $message;

    /**
     * New version of a message that is known to the bot and was edited
     *
     * @var Message|null
     */
    private $edited_message;

    /**
     * New incoming channel post of any kind — text, photo, sticker, etc.
     *
     * @var Message|null
     */
    private $channel_post;

    /**
     * New version of a channel post that is known to the bot and was edited
     *
     * @var Message|null
     */
    private $edited_channel_post;

    /**
     * New incoming inline query
     *
     * @var InlineQuery|null
     */
    private $inline_query;

    /**
     * The result of an inline query that was chosen by a user and sent to their chat partner. Please see our documentation
     * on the feedback collecting for details on how to enable these updates for your bot.
     *
     * @var ChosenInlineResult|null
     */
    private $chosen_inline_result;

    /**
     * New incoming callback query
     *
     * @var CallbackQuery|null
     */
    private $callback_query;

    /**
     * New incoming shipping query. Only for invoices with flexible price
     *
     * @var ShippingQuery|null
     */
    private $shipping_query;

    /**
     * New incoming pre-checkout query. Contains full information about checkout
     *
     * @var PreCheckoutQuery|null
     */
    private $pre_checkout_query;

    /**
     * The update‘s unique identifier. Update identifiers start from a certain positive number and increase sequentially.
     * This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates or to
     * restore the correct update sequence, should they get out of order. If there are no new updates for at least a week,
     * then identifier of the next update will be chosen randomly instead of sequentially.
     *
     * @return int
     */
    public function getUpdateId(): int
    {
        return $this->update_id;
    }

    /**
     * New incoming message of any kind — text, photo, sticker, etc.
     *
     * @return Message|null
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    /**
     * New version of a message that is known to the bot and was edited
     *
     * @return Message|null
     */
    public function getEditedMessage(): ?Message
    {
        return $this->edited_message;
    }

    /**
     * New incoming channel post of any kind — text, photo, sticker, etc.
     *
     * @return Message|null
     */
    public function getChannelPost(): ?Message
    {
        return $this->channel_post;
    }

    /**
     * New version of a channel post that is known to the bot and was edited
     *
     * @return Message|null
     */
    public function getEditedChannelPost(): ?Message
    {
        return $this->edited_channel_post;
    }

    /**
     * New incoming inline query
     *
     * @return InlineQuery|null
     */
    public function getInlineQuery(): ?InlineQuery
    {
        return $this->inline_query;
    }

    /**
     * The result of an inline query that was chosen by a user and sent to their chat partner. Please see our documentation
     * on the feedback collecting for details on how to enable these updates for your bot.
     *
     * @return ChosenInlineResult|null
     */
    public function getChosenInlineResult(): ?ChosenInlineResult
    {
        return $this->chosen_inline_result;
    }

    /**
     * New incoming callback query
     *
     * @return CallbackQuery|null
     */
    public function getCallbackQuery(): ?CallbackQuery
    {
        return $this->callback_query;
    }

    /**
     * New incoming shipping query. Only for invoices with flexible price
     *
     * @return ShippingQuery|null
     */
    public function getShippingQuery(): ?ShippingQuery
    {
        return $this->shipping_query;
    }

    /**
     * New incoming pre-checkout query. Contains full information about checkout
     *
     * @return PreCheckoutQuery|null
     */
    public function getPreCheckoutQuery(): ?PreCheckoutQuery
    {
        return $this->pre_checkout_query;
    }

    /**
      * Creates Update object from data.
      * @param \stdClass $data
      * @return Update
      */
    public static function createFromObject(?\stdClass $data): ?Update
    {
        if (is_null($data)) {
            return null;
        }
        $object = new Update();
        $object->update_id = $data->update_id;
        $object->message = Message::createFromObject($data->message ?? null);
        $object->edited_message = Message::createFromObject($data->edited_message ?? null);
        $object->channel_post = Message::createFromObject($data->channel_post ?? null);
        $object->edited_channel_post = Message::createFromObject($data->edited_channel_post ?? null);
        $object->inline_query = InlineQuery::createFromObject($data->inline_query ?? null);
        $object->chosen_inline_result = ChosenInlineResult::createFromObject($data->chosen_inline_result ?? null);
        $object->callback_query = CallbackQuery::createFromObject($data->callback_query ?? null);
        $object->shipping_query = ShippingQuery::createFromObject($data->shipping_query ?? null);
        $object->pre_checkout_query = PreCheckoutQuery::createFromObject($data->pre_checkout_query ?? null);
        return $object;
    }

    /**
      * Creates array of Update objects from data.
      * @param array $data
      * @return Update[]
      */
    public static function createFromObjectList(?array $data): ?array
    {
        if (is_null($data)) {
            return null;
        };
        $objects = [];
        foreach ($data as $row) {
            $objects[] = static::createFromObject($row);
        }
        return $objects;
    }

}
