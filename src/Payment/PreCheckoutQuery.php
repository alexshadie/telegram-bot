<?php

namespace alexshadie\TelegramBot\Payment;

use alexshadie\TelegramBot\Objects\Object;
use alexshadie\TelegramBot\Objects\User;

/**
 * This object contains information about an incoming pre-checkout query.
 *
 * 
 *
 * Games
 *
 * Your bot can offer users HTML5 games to play solo or to compete against each other in groups and one-on-one chats.
 * Create games via @BotFather using the /newgame command. Please note that this kind of power requires responsibility:
 * you will need to accept the terms for each game that your bots will be offering.
 *
 * 
 *
 * Games are a new type of content on Telegram, represented by the Game and InlineQueryResultGame objects.
 *
 * Once you've created a game via BotFather, you can send games to chats as regular messages using the sendGame method,
 * or use inline mode with InlineQueryResultGame.
 *
 * If you send the game message without any buttons, it will automatically have a 'Play GameName' button. When this
 * button is pressed, your bot gets a CallbackQuery with the game_short_name of the requested game. You provide the
 * correct URL for this particular user and the app opens the game in the in-app browser.
 *
 * You can manually add multiple buttons to your game message. Please note that the first button in the first row must
 * always launch the game, using the field callback_game in InlineKeyboardButton. You can add extra buttons according to
 * taste: e.g., for a description of the rules, or to open the game's official community.
 *
 * To make your game more attractive, you can upload a GIF animation that demostrates the game to the users via
 * BotFather (see Lumberjack for example).
 *
 * A game message will also display high scores for the current chat. Use setGameScore to post high scores to the chat
 * with the game, add the edit_message parameter to automatically update the message with the current scoreboard.
 *
 * Use getGameHighScores to get data for in-game high score tables.
 *
 * You can also add an extra sharing button for users to share their best score to different chats.
 *
 * For examples of what can be done using this new stuff, check the @gamebot and @gamee bots.
 *
 */
class PreCheckoutQuery extends Object
{
    /**
     * Unique query identifier
     *
     * @var string
     */
    private $id;

    /**
     * User who sent the query
     *
     * @var User
     */
    private $from;

    /**
     * Three-letter ISO 4217 currency code
     *
     * @var string
     */
    private $currency;

    /**
     * Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45
     * pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for
     * each currency (2 for the majority of currencies).
     *
     * @var int
     */
    private $total_amount;

    /**
     * Bot specified invoice payload
     *
     * @var string
     */
    private $invoice_payload;

    /**
     * Identifier of the shipping option chosen by the user
     *
     * @var string|null
     */
    private $shipping_option_id;

    /**
     * Order info provided by the user
     *
     * @var OrderInfo|null
     */
    private $order_info;

    /**
     * Unique query identifier
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * User who sent the query
     *
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * Three-letter ISO 4217 currency code
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45
     * pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for
     * each currency (2 for the majority of currencies).
     *
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    /**
     * Bot specified invoice payload
     *
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    /**
     * Identifier of the shipping option chosen by the user
     *
     * @return string|null
     */
    public function getShippingOptionId(): ?string
    {
        return $this->shipping_option_id;
    }

    /**
     * Order info provided by the user
     *
     * @return OrderInfo|null
     */
    public function getOrderInfo(): ?OrderInfo
    {
        return $this->order_info;
    }

    /**
      * Creates PreCheckoutQuery object from data.
      * @param \stdClass $data
      * @return PreCheckoutQuery
      */
    public static function createFromObject(?\stdClass $data): ?PreCheckoutQuery
    {
        if (is_null($data)) {
            return null;
        }
        $object = new PreCheckoutQuery();
        $object->id = $data->id;
        $object->from = User::createFromObject($data->from);
        $object->currency = $data->currency;
        $object->total_amount = $data->total_amount;
        $object->invoice_payload = $data->invoice_payload;
        $object->shipping_option_id = $data->shipping_option_id ?? null;
        $object->order_info = OrderInfo::createFromObject($data->order_info ?? null);
        return $object;
    }

    /**
      * Creates array of PreCheckoutQuery objects from data.
      * @param array $data
      * @return PreCheckoutQuery[]
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
