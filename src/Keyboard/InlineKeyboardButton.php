<?php

namespace alexshadie\TelegramBot\Keyboard;

use alexshadie\TelegramBot\Game\CallbackGame;
use alexshadie\TelegramBot\Objects\Object;

/**
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 *
 */
class InlineKeyboardButton extends Object
{
    /**
     * Label text on the button
     *
     * @var string
     */
    private $text;

    /**
     * HTTP url to be opened when button is pressed
     *
     * @var string|null
     */
    private $url;

    /**
     * Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
     *
     * @var string|null
     */
    private $callback_data;

    /**
     * If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot‘s
     * username and the specified inline query in the input field. Can be empty, in which case just the bot’s username
     * will be inserted.Note: This offers an easy way for users to start using your bot in inline mode when they are
     * currently in a private chat with it. Especially useful when combined with switch_pm… actions – in this case the
     * user will be automatically returned to the chat they switched from, skipping the chat selection screen.
     *
     * @var string|null
     */
    private $switch_inline_query;

    /**
     * If set, pressing the button will insert the bot‘s username and the specified inline query in the current chat's
     * input field. Can be empty, in which case only the bot’s username will be inserted.This offers a quick way for the
     * user to open your bot in inline mode in the same chat – good for selecting something from multiple options.
     *
     * @var string|null
     */
    private $switch_inline_query_current_chat;

    /**
     * Description of the game that will be launched when the user presses the button.NOTE: This type of button must always
     * be the first button in the first row.
     *
     * @var CallbackGame|null
     */
    private $callback_game;

    /**
     * Specify True, to send a Pay button.NOTE: This type of button must always be the first button in the first row.
     *
     * @var bool|null
     */
    private $pay;

    /**
     * InlineKeyboardButton constructor.
     *
     * @param string $text
     * @param string|null $url
     * @param string|null $callbackData
     * @param string|null $switchInlineQuery
     * @param string|null $switchInlineQueryCurrentChat
     * @param CallbackGame|null $callbackGame
     * @param bool|null $pay
     */
    public function __construct(string $text, ?string $url = null, ?string $callbackData = null, ?string $switchInlineQuery = null, ?string $switchInlineQueryCurrentChat = null, ?CallbackGame $callbackGame = null, ?bool $pay = null)
    {
        $this->text = $text;
        $this->url = $url;
        $this->callback_data = $callbackData;
        $this->switch_inline_query = $switchInlineQuery;
        $this->switch_inline_query_current_chat = $switchInlineQueryCurrentChat;
        $this->callback_game = $callbackGame;
        $this->pay = $pay;
    }

    /**
     * Label text on the button
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * HTTP url to be opened when button is pressed
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
     *
     * @return string|null
     */
    public function getCallbackData(): ?string
    {
        return $this->callback_data;
    }

    /**
     * If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot‘s
     * username and the specified inline query in the input field. Can be empty, in which case just the bot’s username
     * will be inserted.Note: This offers an easy way for users to start using your bot in inline mode when they are
     * currently in a private chat with it. Especially useful when combined with switch_pm… actions – in this case the
     * user will be automatically returned to the chat they switched from, skipping the chat selection screen.
     *
     * @return string|null
     */
    public function getSwitchInlineQuery(): ?string
    {
        return $this->switch_inline_query;
    }

    /**
     * If set, pressing the button will insert the bot‘s username and the specified inline query in the current chat's
     * input field. Can be empty, in which case only the bot’s username will be inserted.This offers a quick way for the
     * user to open your bot in inline mode in the same chat – good for selecting something from multiple options.
     *
     * @return string|null
     */
    public function getSwitchInlineQueryCurrentChat(): ?string
    {
        return $this->switch_inline_query_current_chat;
    }

    /**
     * Description of the game that will be launched when the user presses the button.NOTE: This type of button must always
     * be the first button in the first row.
     *
     * @return CallbackGame|null
     */
    public function getCallbackGame(): ?CallbackGame
    {
        return $this->callback_game;
    }

    /**
     * Specify True, to send a Pay button.NOTE: This type of button must always be the first button in the first row.
     *
     * @return bool|null
     */
    public function getPay(): ?bool
    {
        return $this->pay;
    }

    /**
     * Creates InlineKeyboardButton object from data.
     * @param \stdClass $data
     * @return InlineKeyboardButton
     */
    public static function createFromObject(?\stdClass $data): ?InlineKeyboardButton
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InlineKeyboardButton(
            $data->text
        );

        $object->url = $data->url ?? null;
        $object->callback_data = $data->callback_data ?? null;
        $object->switch_inline_query = $data->switch_inline_query ?? null;
        $object->switch_inline_query_current_chat = $data->switch_inline_query_current_chat ?? null;
        $object->callback_game = CallbackGame::createFromObject($data->callback_game ?? null);
        $object->pay = $data->pay ?? null;

        return $object;
    }

    /**
     * Creates array of InlineKeyboardButton objects from data.
     * @param array $data
     * @return InlineKeyboardButton[]
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

    public function getMarkup()
    {
        $result = [
            'text' => $this->getText(),
        ];
        if ($this->getUrl()) {
            $result['url'] = $this->getUrl();
        }
        if ($this->getCallbackData()) {
            $result['callback_data'] = $this->getCallbackData();
        }
        if ($this->getSwitchInlineQuery()) {
            $result['switch_inline_query'] = $this->getSwitchInlineQuery();
        }
        if ($this->getSwitchInlineQueryCurrentChat()) {
            $result['switch_inline_query_current_chat'] = $this->getSwitchInlineQueryCurrentChat();
        }
        if ($this->getCallbackGame()) {
            $result['callback_game'] = $this->getCallbackGame();
        }
        if ($this->getPay()) {
            $result['pay'] = $this->getPay();
        }
        return $result;
    }
}
