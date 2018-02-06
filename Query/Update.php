<?php

namespace alexshadie\TelegramBot\Query;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Этот объект представляет из себя входящее обновление. Под обновлением подразумевается действие,
 * совершённое с ботом — например, получение сообщения от пользователя.
 *
 * Только один из необязательных параметров может присутствовать в каждом обновлении.
 * @package telegram
 */
class Update extends Object
{
    /**
     * The update‘s unique identifier. Update identifiers start from a certain positive number and increase sequentially.
     * This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates or to
     * restore the correct update sequence, should they get out of order.
     * @var int
     */
    private $update_id;
    /**
     * New incoming message of any kind — text, photo, sticker, etc.
     * @var Message|null
     */
    private $message;
    /**
     * New incoming inline query
     * @var InlineQuery|null
     */
    private $inline_query;
    /**
     * The result of an inline query that was chosen by a user and sent to their chat partner.
     * @var ChosenInlineResult|null
     */
    private $chosen_inline_result;
    /**
     * New incoming callback query
     * @var CallbackQuery|null
     */
    private $callback_query;

    /**
     * @return int
     */
    public function getUpdateId(): int
    {
        return $this->update_id;
    }

    /**
     * @return Message|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return InlineQuery|null
     */
    public function getInlineQuery()
    {
        return $this->inline_query;
    }

    /**
     * @return ChosenInlineResult|null
     */
    public function getChosenInlineResult()
    {
        return $this->chosen_inline_result;
    }

    /**
     * @return CallbackQuery|null
     */
    public function getCallbackQuery()
    {
        return $this->callback_query;
    }

    /**
     * @param $data
     * @return Update|null
     */
    public static function createFromObject($data) {
        if (is_null($data)) {
            return null;
        }
        $update = new Update();
        $update->update_id = $data->update_id;
        $update->message = Message::createFromObject($data->message ?? null);
        /*
object(stdClass)#32 (2) {
  ["update_id"]=>
  int(655017557)
  ["edited_message"]=>
  object(stdClass)#33 (6) {
    ["message_id"]=>
    int(94)
    ["from"]=>
    object(stdClass)#34 (6) {
      ["id"]=>
      int(258500651)
      ["is_bot"]=>
      bool(false)
      ["first_name"]=>
      string(4) "Alex"
      ["last_name"]=>
      string(6) "Shadie"
      ["username"]=>
      string(10) "alexshadie"
      ["language_code"]=>
      string(5) "en-US"
    }
    ["chat"]=>
    object(stdClass)#35 (5) {
      ["id"]=>
      int(258500651)
      ["first_name"]=>
      string(4) "Alex"
      ["last_name"]=>
      string(6) "Shadie"
      ["username"]=>
      string(10) "alexshadie"
      ["type"]=>
      string(7) "private"
    }
    ["date"]=>
    int(1517083670)
    ["edit_date"]=>
    int(1517083678)
    ["text"]=>
    string(16) "contractor: test"
  }
}
         */
//        $update->edited_message = null;// EditedMessage
        $update->inline_query = null;//InlineQuery::createFromObject($data->inline_query);
        $update->chosen_inline_result = null;//ChosenInlineResult::createFromObject($data->chosen_inline_result);
        $update->callback_query = null;//CallbackQuery::createFromObject($data->callback_query);
        return $update;
    }
    /**
     * @param $data
     * @return Update[]|null
     */
    public static function createFromObjectList($data) {
        if (is_null($data)) {
            return null;
        }
        $updates = [];
        foreach ($data as $row) {
            $updates[] = self::createFromObject($row);
        }
        return $updates;
    }
}
