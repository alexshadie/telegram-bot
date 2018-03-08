<?php

namespace alexshadie\TelegramBot\Inline;

use alexshadie\TelegramBot\Objects\Object;

/**
 * Represents the content of a text message to be sent as the result of an inline query.
 *
 */
class InputTextMessageContent extends Object
{
    /**
     * Text of the message to be sent, 1-4096 characters
     *
     * @var string
     */
    private $message_text;

    /**
     * Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's
     * message.
     *
     * @var string|null
     */
    private $parse_mode;

    /**
     * Disables link previews for links in the sent message
     *
     * @var bool|null
     */
    private $disable_web_page_preview;

    /**
     * InputTextMessageContent constructor.
     *
     * @param string $messageText
     * @param string|null $parseMode
     * @param bool|null $disableWebPagePreview
     */
    public function __construct(string $messageText, ?string $parseMode = null, ?bool $disableWebPagePreview = null)
    {
        $this->message_text = $messageText;
        $this->parse_mode = $parseMode;
        $this->disable_web_page_preview = $disableWebPagePreview;
    }

    /**
     * Text of the message to be sent, 1-4096 characters
     *
     * @return string
     */
    public function getMessageText(): string
    {
        return $this->message_text;
    }

    /**
     * Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's
     * message.
     *
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parse_mode;
    }

    /**
     * Disables link previews for links in the sent message
     *
     * @return bool|null
     */
    public function getDisableWebPagePreview(): ?bool
    {
        return $this->disable_web_page_preview;
    }

    /**
      * Creates InputTextMessageContent object from data.
      * @param \stdClass $data
      * @return InputTextMessageContent
      */
    public static function createFromObject(?\stdClass $data): ?InputTextMessageContent
    {
        if (is_null($data)) {
            return null;
        }
        $object = new InputTextMessageContent(
            $data->message_text
        );

        $object->parse_mode = $data->parse_mode ?? null;
        $object->disable_web_page_preview = $data->disable_web_page_preview ?? null;

        return $object;
    }

    /**
      * Creates array of InputTextMessageContent objects from data.
      * @param array $data
      * @return InputTextMessageContent[]
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
