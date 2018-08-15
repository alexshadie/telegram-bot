<?php


namespace alexshadie\TelegramBot\Objects;


use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;
use alexshadie\TelegramBot\Keyboard\ReplyKeyboardMarkup;
use alexshadie\TelegramBot\Keyboard\ReplyKeyboardRemove;

class ReplyMarkup
{
    /** @var InlineKeyboardMarkup */
    private $inlineKeyboard;
    /** @var ReplyKeyboardMarkup */
    private $replyKeyboard;
    /** @var ReplyKeyboardRemove */
    private $replyKeyboardRemove;

    public function __construct()
    {
    }

    public function setInlineKeyboard(?InlineKeyboardMarkup $inlineKeyboardMarkup)
    {
        $this->inlineKeyboard = $inlineKeyboardMarkup;
    }

    public function setReplyKeyboard(?ReplyKeyboardMarkup $replyKeyboardMarkup)
    {
        $this->replyKeyboard = $replyKeyboardMarkup;
    }

    public function setReplyKeyboardRemove(?ReplyKeyboardRemove $replyKeyboardRemove)
    {
        $this->replyKeyboardRemove = $replyKeyboardRemove;
    }

    public function getMarkup()
    {
        $markup = [];
        if ($this->inlineKeyboard) {
            $markup = array_merge($markup, $this->inlineKeyboard->getMarkup());
        }
        if ($this->replyKeyboard) {
            $markup = array_merge($markup, $this->replyKeyboard->getMarkup());
        }
        if ($this->replyKeyboardRemove) {
            $markup = array_merge($markup, $this->replyKeyboardRemove->getMarkup());
        }
        return json_encode($markup);
    }

}