<?php


namespace alexshadie\TelegramBot\Bot;


use alexshadie\TelegramBot\Bot\Exception\TelegramResponseException;
use alexshadie\TelegramBot\Chat\Chat;
use alexshadie\TelegramBot\Chat\ChatMember;
use alexshadie\TelegramBot\Game\GameHighScore;
use alexshadie\TelegramBot\Inline\InlineQueryResult;
use alexshadie\TelegramBot\Inline\InputMedia;
use alexshadie\TelegramBot\Keyboard\InlineKeyboardMarkup;
use alexshadie\TelegramBot\Message\File;
use alexshadie\TelegramBot\Objects\InputFile;
use alexshadie\TelegramBot\Objects\ReplyMarkup;
use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Objects\UserProfilePhotos;
use alexshadie\TelegramBot\Objects\WebhookInfo;
use alexshadie\TelegramBot\Payment\LabeledPrice;
use alexshadie\TelegramBot\Payment\ShippingOption;
use alexshadie\TelegramBot\Query\Message;
use alexshadie\TelegramBot\Query\UpdateBatch;
use alexshadie\TelegramBot\Sticker\MaskPosition;
use alexshadie\TelegramBot\Sticker\StickerSet;

interface BotApiInterface
{
    /** Telegram API url */
    const TELEGRAM_URL = "https://api.telegram.org";

    /**
     * Use this method to receive incoming updates using long polling (wiki). An Array of Update objects is returned.
     *
     * Notes
     * 1. This method will not work if an outgoing webhook is set up.
     * 2. In order to avoid getting duplicate updates, recalculate offset after each server response.
     *
     *  TODO: check webhooks
     *
     * @param int $offset Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers of
     *     previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An
     *     update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id. The
     *     negative offset can be specified to retrieve updates starting from -offset update from the end of the updates
     *     queue. All previous updates will forgotten.
     * @param int $limit Limits the number of updates to be retrieved. Values between 1—100 are accepted. Defaults to 100.
     * @param int $timeout Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive, short polling
     *     should be used for testing purposes only.
     * @param string[] $allowedUpdates List the types of updates you want your bot to receive. For example, specify [“message”,
     *     “edited_channel_post”, “callback_query”] to only receive updates of these types. See Update for a
     *     complete list of available update types. Specify an empty list to receive all updates regardless of type
     *     (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect
     *     updates created before the call to the getUpdates, so unwanted updates may be received for a short period of
     *     time.
     * @return UpdateBatch
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function getUpdates(?int $offset = null, ?int $limit = null, ?int $timeout = null, ?array $allowedUpdates = null): UpdateBatch;

    /**
     * Use this method to specify a url and receive incoming updates via an outgoing webhook. Whenever there is an update
     * for the bot, we will send an HTTPS POST request to the specified url, containing a JSON-serialized Update. In case of
     * an unsuccessful request, we will give up after a reasonable amount of attempts. Returns true.
     * If you'd like to make sure that the Webhook request comes from Telegram, we recommend using a secret path in the URL,
     * e.g. https://www.example.com/&lt;token&gt;. Since nobody else knows your bot‘s token, you can be pretty sure it’s
     * us.
     *
     * Notes
     * 1. You will not be able to receive updates using getUpdates for as long as an outgoing webhook is set up.
     * 2. To use a self-signed certificate, you need to upload your public key certificate using certificate parameter.
     * Please upload as InputFile, sending a String will not work.
     * 3. Ports currently supported for Webhooks: 443, 80, 88, 8443.
     * NEW! If you're having any trouble setting up webhooks, please check out this amazing guide to Webhooks.
     *
     * @param string $endpoint HTTPS url to send updates to. Use an empty string to remove webhook integration
     * @param string $certFile Upload your public key certificate so that the root certificate in use can be checked. See our self-signed guide
     *     for details.
     * @param int $maxConnections Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. Defaults to
     *     40. Use lower values to limit the load on your bot‘s server, and higher values to increase your bot’s
     *     throughput.
     * @param string[] $allowedUpdates List the types of updates you want your bot to receive. For example, specify [“message”,
     *     “edited_channel_post”, “callback_query”] to only receive updates of these types. See Update for a
     *     complete list of available update types. Specify an empty list to receive all updates regardless of type
     *     (default). If not specified, the previous setting will be used.Please note that this parameter doesn't affect
     *     updates created before the call to the setWebhook, so unwanted updates may be received for a short period of
     *     time.
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function registerWebHook(string $endpoint, string $certFile, ?int $maxConnections = null, ?array $allowedUpdates = null): bool;

    /**
     * Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success.
     * Requires no parameters.
     *
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function dropWebhook(): bool;

    /**
     * Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If
     * the bot is using getUpdates, will return an object with the url field empty.
     *
     * @return WebhookInfo
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function getWebhookInfo(): WebhookInfo;

    /**
     * A simple method for testing your bot's auth token. Requires no parameters. Returns basic information about the bot in
     * form of a User object.
     *
     * @return User
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function getMe(): User;

    /**
     * Use this method to send text messages. On success, the sent Message is returned.
     *
     * TODO: Last arg
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $text Text of the message to be sent
     * @param string $parseMode Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your
     *     bot's message.
     * @param bool $disableWebPagePreview Disables link previews for links in this message
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param ReplyMarkup|null $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *     instructions to remove reply keyboard or to force a reply from the user.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendMessage(string $chatId, string $text, ?string $parseMode = null, ?bool $disableWebPagePreview = null, ?bool $disableNotification = null, ?int $replyToMessageId = null, ?ReplyMarkup $replyMarkup = null): Message;

    /**
     * Use this method to forward messages of any kind. On success, the sent Message is returned.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $fromChatId Unique identifier for the chat where the original message was sent (or channel username in the format
     * @channelusername)
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $messageId Message identifier in the chat specified in from_chat_id
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function forwardMessage(string $chatId, string $fromChatId, ?bool $disableNotification = null, int $messageId): Message;

    /**
     * Use this method to send photos. On success, the sent Message is returned.
     * TODO: Input file for photo
     * TODO: Last arg
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $photo Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass
     *     an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using
     *     multipart/form-data. More info on Sending Files »
     * @param string $caption Photo caption (may also be used when resending photos by file_id), 0-200 characters
     * @param string $parseMode Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the
     *     media caption.
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param mixed $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *     instructions to remove reply keyboard or to force a reply from the user.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendPhoto(string $chatId, string $photo, ?string $caption = null, ?string $parseMode = null, ?bool $disableNotification = null, ?int $replyToMessageId = null, $replyMarkup = null): Message;

    /**
     * Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio
     * must be in the .mp3 format. On success, the sent Message is returned. Bots can currently send audio files of up to 50
     * MB in size, this limit may be changed in the future.
     * For sending voice messages, use the sendVoice method instead.
     *
     * TODO: second and last arg
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $audio Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers
     *     (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new
     *     one using multipart/form-data. More info on Sending Files »
     * @param string $caption Audio caption, 0-200 characters
     * @param string $parseMode Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the
     *     media caption.
     * @param int $duration Duration of the audio in seconds
     * @param string $performer Performer
     * @param string $title Track name
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param mixed $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *     instructions to remove reply keyboard or to force a reply from the user.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendAudio(string $chatId, string $audio, ?string $caption = null, ?string $parseMode = null, ?int $duration = null, ?string $performer = null, ?string $title = null, ?bool $disableNotification = null, ?int $replyToMessageId = null, $replyMarkup = null): Message;

    /**
     * Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any
     * type of up to 50 MB in size, this limit may be changed in the future.
     *
     * TODO: second and last arg
     * TODO: InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $document File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an
     *     HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data.
     *     More info on Sending Files »
     * @param string $caption Document caption (may also be used when resending documents by file_id), 0-200 characters
     * @param string $parseMode Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the
     *     media caption.
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param mixed $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *     instructions to remove reply keyboard or to force a reply from the user.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendDocument(string $chatId, string $document, ?string $caption = null, ?string $parseMode = null, ?bool $disableNotification = null, ?int $replyToMessageId = null, $replyMarkup = null): Message;

    /**
     * Use this method to send video files, Telegram clients support mp4 videos (other formats may be sent as Document). On
     * success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be
     * changed in the future.
     *
     * TODO: second and last arg
     * TODO: InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $video Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass
     *     an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using
     *     multipart/form-data. More info on Sending Files »
     * @param int $duration Duration of sent video in seconds
     * @param int $width Video width
     * @param int $height Video height
     * @param string $caption Video caption (may also be used when resending videos by file_id), 0-200 characters
     * @param string $parseMode Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the
     *     media caption.
     * @param bool $supportsStreaming Pass True, if the uploaded video is suitable for streaming
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param mixed $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *     instructions to remove reply keyboard or to force a reply from the user.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendVideo(string $chatId, string $video, ?int $duration = null, ?int $width = null, ?int $height = null, ?string $caption = null, ?string $parseMode = null, ?bool $supportsStreaming = null, ?bool $disableNotification = null, ?int $replyToMessageId = null, $replyMarkup = null): Message;

    /**
     * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message.
     * For this to work, your audio must be in an .ogg file encoded with OPUS (other formats may be sent as Audio or
     * Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size,
     * this limit may be changed in the future.
     *
     * TODO: second and last arg
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $voice Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended),
     *     pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using
     *     multipart/form-data. More info on Sending Files »
     * @param string $caption Voice message caption, 0-200 characters
     * @param string $parseMode Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the
     *     media caption.
     * @param int $duration Duration of the voice message in seconds
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param mixed $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *     instructions to remove reply keyboard or to force a reply from the user.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendVoice(string $chatId, string $voice, ?string $caption = null, ?string $parseMode = null, ?int $duration = null, ?bool $disableNotification = null, ?int $replyToMessageId = null, $replyMarkup = null): Message;

    /**
     * As of v.4.0, Telegram clients support rounded square mp4 videos of up to 1 minute long. Use this method to send video
     * messages. On success, the sent Message is returned.
     *
     * TODO: second and last arg
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $videoNote Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers
     *     (recommended) or upload a new video using multipart/form-data. More info on Sending Files ». Sending video notes
     *     by a URL is currently unsupported
     * @param int $duration Duration of sent video in seconds
     * @param int $length Video width and height
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param mixed $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *     instructions to remove reply keyboard or to force a reply from the user.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendVideoNote(string $chatId, string $videoNote, ?int $duration = null, ?int $length = null, ?bool $disableNotification = null, ?int $replyToMessageId = null, mixed $replyMarkup = null): Message;

    /**
     * Use this method to send a group of photos or videos as an album. On success, an array of the sent Messages is
     * returned.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputMedia[] $media A JSON-serialized array describing photos and videos to be sent, must include 2–10 items
     * @param bool $disableNotification Sends the messages silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the messages are a reply, ID of the original message
     * @return Message[]
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendMediaGroup(string $chatId, array $media, ?bool $disableNotification = null, ?int $replyToMessageId = null): array;

    /**
     * Use this method to send point on the map. On success, the sent Message is returned.
     *
     * TODO: last arg
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param float $latitude Latitude of the location
     * @param float $longitude Longitude of the location
     * @param int $livePeriod Period in seconds for which the location will be updated (see Live Locations, should be between 60 and 86400.
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param mixed $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *     instructions to remove reply keyboard or to force a reply from the user.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendLocation(string $chatId, float $latitude, float $longitude, ?int $livePeriod = null, ?bool $disableNotification = null, ?int $replyToMessageId = null, $replyMarkup = null): Message;

    /**
     * Use this method to edit live location messages sent by the bot or via the bot (for inline bots). A location can be
     * edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On
     * success, if the edited message was sent by the bot, the edited Message is returned, otherwise True is returned.
     *
     * @param string $chatId Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target
     *     channel (in the format @channelusername)
     * @param int $messageId Required if inline_message_id is not specified. Identifier of the sent message
     * @param string $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param float $latitude Latitude of new location
     * @param float $longitude Longitude of new location
     * @param InlineKeyboardMarkup $replyMarkup A JSON-serialized object for a new inline keyboard.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function editMessageLiveLocation(?string $chatId = null, ?int $messageId = null, ?string $inlineMessageId = null, float $latitude, float $longitude, ?InlineKeyboardMarkup $replyMarkup = null): Message;

    /**
     * Use this method to stop updating a live location message sent by the bot or via the bot (for inline bots) before
     * live_period expires. On success, if the message was sent by the bot, the sent Message is returned, otherwise True is
     * returned.
     *
     * @param string $chatId Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target
     *     channel (in the format @channelusername)
     * @param int $messageId Required if inline_message_id is not specified. Identifier of the sent message
     * @param string $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param InlineKeyboardMarkup $replyMarkup A JSON-serialized object for a new inline keyboard.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function stopMessageLiveLocation(?string $chatId = null, ?int $messageId = null, ?string $inlineMessageId = null, ?InlineKeyboardMarkup $replyMarkup = null): Message;

    /**
     * Use this method to send information about a venue. On success, the sent Message is returned.
     *
     * TODO: last arg
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param float $latitude Latitude of the venue
     * @param float $longitude Longitude of the venue
     * @param string $title Name of the venue
     * @param string $address Address of the venue
     * @param string $foursquareId Foursquare identifier of the venue
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param mixed $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *     instructions to remove reply keyboard or to force a reply from the user.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendVenue(string $chatId, float $latitude, float $longitude, string $title, string $address, ?string $foursquareId = null, ?bool $disableNotification = null, ?int $replyToMessageId = null, mixed $replyMarkup = null): Message;

    /**
     * Use this method to send phone contacts. On success, the sent Message is returned.
     *
     * TODO: last arg
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $phoneNumber Contact's phone number
     * @param string $firstName Contact's first name
     * @param string $lastName Contact's last name
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param mixed $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *     instructions to remove keyboard or to force a reply from the user.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendContact(string $chatId, string $phoneNumber, string $firstName, ?string $lastName = null, ?bool $disableNotification = null, ?int $replyToMessageId = null, $replyMarkup = null): Message;

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5
     * seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on
     * success.
     *
     * Example: The ImageBot needs some time to process a request and upload the image. Instead of sending a text message
     * along the lines of “Retrieving image, please wait…”, the bot may use sendChatAction with action = upload_photo.
     * The user will see a “sending photo” status for the bot.
     *
     * We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $action Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text
     *     messages, upload_photo for photos, record_video or upload_video for videos, record_audio or upload_audio for
     *     audio files, upload_document for general files, find_location for location data, record_video_note or
     *     upload_video_note for video notes.
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendChatAction(string $chatId, string $action): bool;

    /**
     * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
     *
     * @param int $userId Unique identifier of the target user
     * @param int $offset Sequential number of the first photo to be returned. By default, all photos are returned.
     * @param int $limit Limits the number of photos to be retrieved. Values between 1—100 are accepted. Defaults to 100.
     * @return UserProfilePhotos
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function getUserProfilePhotos(int $userId, ?int $offset = null, ?int $limit = null): UserProfilePhotos;

    /**
     * Use this method to get basic info about a file and prepare it for downloading. For the moment, bots can download
     * files of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the link
     * https://api.telegram.org/file/bot&lt;token&gt;/&lt;file_path&gt;, where &lt;file_path&gt; is taken from the response.
     * It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested
     * by calling getFile again.
     * Note: This function may not preserve the original file name and MIME type. You should save the file's MIME type and
     * name (if available) when the File object is received.
     *
     * TODO: Check invalid file
     *
     * @param string $fileId File identifier to get info about
     * @return File
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function getFile(string $fileId): File;

    /**
     * Downloads file
     * TODO: Check for invalid file
     *
     * @param File $file
     * @param string $tmpPath
     */
    public function downloadFile(File $file, string $tmpPath): void;

    /**
     * Use this method to kick a user from a group, a supergroup or a channel. In the case of supergroups and channels, the
     * user will not be able to return to the group on their own using invite links, etc., unless unbanned first. The bot
     * must be an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on
     * success.
     *
     * Note: In regular groups (non-supergroups), this method will only work if the ‘All Members Are Admins’ setting is
     * off in the target group. Otherwise members may only be removed by the group's creator or by the member that added
     * them.
     *
     * @param string $chatId Unique identifier for the target group or username of the target supergroup or channel (in the format
     * @channelusername)
     * @param int $userId Unique identifier of the target user
     * @param int $untilDate Date when the user will be unbanned, unix time. If user is banned for more than 366 days or less than 30 seconds
     *     from the current time they are considered to be banned forever
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function kickChatMember(string $chatId, int $userId, ?int $untilDate = null): bool;

    /**
     * Use this method to unban a previously kicked user in a supergroup or channel. The user will not return to the group
     * or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work.
     * Returns True on success.
     *
     * @param string $chatId Unique identifier for the target group or username of the target supergroup or channel (in the format @username)
     * @param int $userId Unique identifier of the target user
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function unbanChatMember(string $chatId, int $userId): bool;

    /**
     * Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to
     * work and must have the appropriate admin rights. Pass True for all boolean parameters to lift restrictions from a
     * user. Returns True on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $userId Unique identifier of the target user
     * @param int $untilDate Date when restrictions will be lifted for the user, unix time. If user is restricted for more than 366 days or
     *     less than 30 seconds from the current time, they are considered to be restricted forever
     * @param bool $canSendMessages Pass True, if the user can send text messages, contacts, locations and venues
     * @param bool $canSendMediaMessages Pass True, if the user can send audios, documents, photos, videos, video notes and voice notes, implies
     *     can_send_messages
     * @param bool $canSendOtherMessages Pass True, if the user can send animations, games, stickers and use inline bots, implies can_send_media_messages
     * @param bool $canAddWebPagePreviews Pass True, if the user may add web page previews to their messages, implies can_send_media_messages
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function restrictChatMember(string $chatId, int $userId, ?int $untilDate = null, ?bool $canSendMessages = null, ?bool $canSendMediaMessages = null, ?bool $canSendOtherMessages = null, ?bool $canAddWebPagePreviews = null): bool;

    /**
     * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the
     * chat for this to work and must have the appropriate admin rights. Pass False for all boolean parameters to demote a
     * user. Returns True on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $userId Unique identifier of the target user
     * @param bool $canChangeInfo Pass True, if the administrator can change chat title, photo and other settings
     * @param bool $canPostMessages Pass True, if the administrator can create channel posts, channels only
     * @param bool $canEditMessages Pass True, if the administrator can edit messages of other users and can pin messages, channels only
     * @param bool $canDeleteMessages Pass True, if the administrator can delete messages of other users
     * @param bool $canInviteUsers Pass True, if the administrator can invite new users to the chat
     * @param bool $canRestrictMembers Pass True, if the administrator can restrict, ban or unban chat members
     * @param bool $canPinMessages Pass True, if the administrator can pin messages, supergroups only
     * @param bool $canPromoteMembers Pass True, if the administrator can add new administrators with a subset of his own privileges or demote
     *     administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by
     *     him)
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function promoteChatMember(string $chatId, int $userId, ?bool $canChangeInfo = null, ?bool $canPostMessages = null, ?bool $canEditMessages = null, ?bool $canDeleteMessages = null, ?bool $canInviteUsers = null, ?bool $canRestrictMembers = null, ?bool $canPinMessages = null, ?bool $canPromoteMembers = null): bool;

    /**
     * Use this method to generate a new invite link for a chat; any previously generated link is revoked. The bot must be
     * an administrator in the chat for this to work and must have the appropriate admin rights. Returns the new invite link
     * as String on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @return string
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function exportChatInviteLink(string $chatId): string;

    /**
     * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be
     * an administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
     *
     * Note: In regular groups (non-supergroups), this method will only work if the ‘All Members Are Admins’ setting is
     * off in the target group.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile $photo New chat photo, uploaded using multipart/form-data
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function setChatPhoto(string $chatId, InputFile $photo): bool;

    /**
     * Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator
     * in the chat for this to work and must have the appropriate admin rights. Returns True on success.
     *
     * Note: In regular groups (non-supergroups), this method will only work if the ‘All Members Are Admins’ setting is
     * off in the target group.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function deleteChatPhoto(string $chatId): bool;

    /**
     * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an
     * administrator in the chat for this to work and must have the appropriate admin rights. Returns True on success.
     *
     * Note: In regular groups (non-supergroups), this method will only work if the ‘All Members Are Admins’ setting is
     * off in the target group.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $title New chat title, 1-255 characters
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function setChatTitle(string $chatId, string $title): bool;

    /**
     * Use this method to change the description of a supergroup or a channel. The bot must be an administrator in the chat
     * for this to work and must have the appropriate admin rights. Returns True on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $description New chat description, 0-255 characters
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function setChatDescription(string $chatId, ?string $description = null): bool;

    /**
     * Use this method to pin a message in a supergroup or a channel. The bot must be an administrator in the chat for this
     * to work and must have the ‘can_pin_messages’ admin right in the supergroup or ‘can_edit_messages’ admin right
     * in the channel. Returns True on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $messageId Identifier of a message to pin
     * @param bool $disableNotification Pass True, if it is not necessary to send a notification to all chat members about the new pinned message.
     *     Notifications are always disabled in channels.
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function pinChatMessage(string $chatId, int $messageId, ?bool $disableNotification = null): bool;

    /**
     * Use this method to unpin a message in a supergroup or a channel. The bot must be an administrator in the chat for
     * this to work and must have the ‘can_pin_messages’ admin right in the supergroup or ‘can_edit_messages’ admin
     * right in the channel. Returns True on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function unpinChatMessage(string $chatId): bool;

    /**
     * Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format
     * @channelusername)
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function leaveChat(string $chatId): bool;

    /**
     * Use this method to get up to date information about the chat (current name of the user for one-on-one conversations,
     * current username of a user, group or channel, etc.). Returns a Chat object on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format
     * @channelusername)
     * @return Chat
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function getChat(string $chatId): Chat;

    /**
     * Use this method to get a list of administrators in a chat. On success, returns an Array of ChatMember objects that
     * contains information about all chat administrators except other bots. If the chat is a group or a supergroup and no
     * administrators were appointed, only the creator will be returned.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format
     * @channelusername)
     * @return ChatMember[]
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function getChatAdministrators(string $chatId): array;

    /**
     * Use this method to get the number of members in a chat. Returns Int on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format
     * @channelusername)
     * @return int
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function getChatMembersCount(string $chatId): int;

    /**
     * Use this method to get information about a member of a chat. Returns a ChatMember object on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target supergroup or channel (in the format
     * @channelusername)
     * @param int $userId Unique identifier of the target user
     * @return ChatMember
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function getChatMember(string $chatId, int $userId): ChatMember;

    /**
     * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for
     * this to work and must have the appropriate admin rights. Use the field can_set_sticker_set optionally returned in
     * getChat requests to check if the bot can use this method. Returns True on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param string $stickerSetName Name of the sticker set to be set as the group sticker set
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function setChatStickerSet(string $chatId, string $stickerSetName): bool;

    /**
     * Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for
     * this to work and must have the appropriate admin rights. Use the field can_set_sticker_set optionally returned in
     * getChat requests to check if the bot can use this method. Returns True on success.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function deleteChatStickerSet(string $chatId): bool;

    /**
     * Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the
     * user as a notification at the top of the chat screen or as an alert. On success, True is returned.
     *
     * Alternatively, the user can be redirected to the specified Game URL. For this option to work, you must first create a
     * game for your bot via @Botfather and accept the terms. Otherwise, you may use links like t.me/your_bot?start=XXXX
     * that open your bot with a parameter.
     *
     * @param string $callbackQueryId Unique identifier for the query to be answered
     * @param string $text Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
     * @param bool $showAlert If true, an alert will be shown by the client instead of a notification at the top of the chat screen. Defaults
     *     to false.
     * @param string $url URL that will be opened by the user's client. If you have created a Game and accepted the conditions via
     * @Botfather, specify the URL that opens your game – note that this will only work if the query comes from a
     *     callback_game button.Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a
     *     parameter.
     * @param int $cacheTime The maximum amount of time in seconds that the result of the callback query may be cached client-side. Telegram
     *     apps will support caching starting in version 3.14. Defaults to 0.
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function answerCallbackQuery(string $callbackQueryId, ?string $text = null, ?bool $showAlert = null, ?string $url = null, ?int $cacheTime = null): bool;

    /**
     * Use this method to edit text and game messages sent by the bot or via the bot (for inline bots). On success, if
     * edited message is sent by the bot, the edited Message is returned, otherwise True is returned.
     *
     * @param string $chatId Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target
     *     channel (in the format @channelusername)
     * @param int $messageId Required if inline_message_id is not specified. Identifier of the sent message
     * @param string $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param string $text New text of the message
     * @param string $parseMode Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your
     *     bot's message.
     * @param bool $disableWebPagePreview Disables link previews for links in this message
     * @param InlineKeyboardMarkup $replyMarkup A JSON-serialized object for an inline keyboard.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function editMessageText(?string $chatId = null, ?int $messageId = null, ?string $inlineMessageId = null, string $text, ?string $parseMode = null, ?bool $disableWebPagePreview = null, ?ReplyMarkup $replyMarkup = null): ?Message;

    /**
     * Use this method to edit captions of messages sent by the bot or via the bot (for inline bots). On success, if edited
     * message is sent by the bot, the edited Message is returned, otherwise True is returned.
     *
     * @param string $chatId Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target
     *     channel (in the format @channelusername)
     * @param int $messageId Required if inline_message_id is not specified. Identifier of the sent message
     * @param string $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param string $caption New caption of the message
     * @param string $parseMode Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the
     *     media caption.
     * @param InlineKeyboardMarkup $replyMarkup A JSON-serialized object for an inline keyboard.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function editMessageCaption(?string $chatId = null, ?int $messageId = null, ?string $inlineMessageId = null, ?string $caption = null, ?string $parseMode = null, ?InlineKeyboardMarkup $replyMarkup = null): Message;

    /**
     * Use this method to edit only the reply markup of messages sent by the bot or via the bot (for inline bots).  On
     * success, if edited message is sent by the bot, the edited Message is returned, otherwise True is returned.
     *
     * @param string $chatId Required if inline_message_id is not specified. Unique identifier for the target chat or username of the target
     *     channel (in the format @channelusername)
     * @param int $messageId Required if inline_message_id is not specified. Identifier of the sent message
     * @param string $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param InlineKeyboardMarkup $replyMarkup A JSON-serialized object for an inline keyboard.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function editMessageReplyMarkup(?string $chatId = null, ?int $messageId = null, ?string $inlineMessageId = null, ?InlineKeyboardMarkup $replyMarkup = null): Message;

    /**
     * Use this method to delete a message, including service messages, with the following limitations:
     * - A message can only be deleted if it was sent less than 48 hours ago.
     * - Bots can delete outgoing messages in groups and supergroups.
     * - Bots granted can_post_messages permissions can delete outgoing messages in channels.
     * - If the bot is an administrator of a group, it can delete any message there.
     * - If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.
     * Returns True on success.
     *
     * Stickers
     * The following methods and objects allow your bot to handle stickers and sticker sets.
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $messageId Identifier of the message to delete
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function deleteMessage(string $chatId, int $messageId): bool;

    /**
     * Use this method to send .webp stickers. On success, the sent Message is returned.
     *
     * TODO: second and last arg
     *
     * @param string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $sticker Sticker to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass
     *     an HTTP URL as a String for Telegram to get a .webp file from the Internet, or upload a new one using
     *     multipart/form-data. More info on Sending Files »
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param mixed $replyMarkup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     *     instructions to remove reply keyboard or to force a reply from the user.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendSticker(string $chatId, string $sticker, ?bool $disableNotification = null, ?int $replyToMessageId = null, $replyMarkup = null): Message;

    /**
     * Use this method to get a sticker set. On success, a StickerSet object is returned.
     *
     * @param string $name Name of the sticker set
     * @return StickerSet
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function getStickerSet(string $name): StickerSet;

    /**
     * Use this method to upload a .png file with a sticker for later use in createNewStickerSet and addStickerToSet methods
     * (can be used multiple times). Returns the uploaded File on success.
     *
     * @param int $userId User identifier of sticker file owner
     * @param InputFile $pngSticker Png image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either
     *     width or height must be exactly 512px. More info on Sending Files »
     * @return File
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function uploadStickerFile(int $userId, InputFile $pngSticker): File;

    /**
     * Use this method to create new sticker set owned by a user. The bot will be able to edit the created sticker set.
     * Returns True on success.
     *
     * TODO: fourth arg
     *
     * @param int $userId User identifier of created sticker set owner
     * @param string $name Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only english
     *     letters, digits and underscores. Must begin with a letter, can't contain consecutive underscores and must end in
     *     “_by_&lt;bot username&gt;”. &lt;bot_username&gt; is case insensitive. 1-64 characters.
     * @param string $title Sticker set title, 1-64 characters
     * @param string $pngSticker Png image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either
     *     width or height must be exactly 512px. Pass a file_id as a String to send a file that already exists on the
     *     Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one
     *     using multipart/form-data. More info on Sending Files »
     * @param string $emojis One or more emoji corresponding to the sticker
     * @param bool $containsMasks Pass True, if a set of mask stickers should be created
     * @param MaskPosition $maskPosition A JSON-serialized object for position where the mask should be placed on faces
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function createNewStickerSet(int $userId, string $name, string $title, string $pngSticker, string $emojis, ?bool $containsMasks = null, ?MaskPosition $maskPosition = null): bool;

    /**
     * Use this method to add a new sticker to a set created by the bot. Returns True on success.
     *
     * TODO: third arg
     *
     * @param int $userId User identifier of sticker set owner
     * @param string $name Sticker set name
     * @param string $pngSticker Png image with the sticker, must be up to 512 kilobytes in size, dimensions must not exceed 512px, and either
     *     width or height must be exactly 512px. Pass a file_id as a String to send a file that already exists on the
     *     Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one
     *     using multipart/form-data. More info on Sending Files »
     * @param string $emojis One or more emoji corresponding to the sticker
     * @param MaskPosition $maskPosition A JSON-serialized object for position where the mask should be placed on faces
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function addStickerToSet(int $userId, string $name, string $pngSticker, string $emojis, ?MaskPosition $maskPosition = null): bool;

    /**
     * Use this method to move a sticker in a set created by the bot to a specific position . Returns True on success.
     *
     * @param string $sticker File identifier of the sticker
     * @param int $position New sticker position in the set, zero-based
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function setStickerPositionInSet(string $sticker, int $position): bool;

    /**
     * Use this method to delete a sticker from a set created by the bot. Returns True on success.
     *
     * Inline mode
     * The following methods and objects allow your bot to work in inline mode.
     * Please see our Introduction to Inline bots for more details.
     * To enable this option, send the /setinline command to @BotFather and provide the placeholder text that the user will
     * see in the input field after typing your bot’s name.
     *
     * @param string $sticker File identifier of the sticker
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function deleteStickerFromSet(string $sticker): bool;

    /**
     * Use this method to send answers to an inline query. On success, True is returned.
     * No more than 50 results per query are allowed.
     *
     * @param string $inlineQueryId Unique identifier for the answered query
     * @param InlineQueryResult[] $results A JSON-serialized array of results for the inline query
     * @param int $cacheTime The maximum amount of time in seconds that the result of the inline query may be cached on the server. Defaults
     *     to 300.
     * @param bool $isPersonal Pass True, if results may be cached on the server side only for the user that sent the query. By default, results
     *     may be returned to any user who sends the same query
     * @param string $nextOffset Pass the offset that a client should send in the next query with the same text to receive more results. Pass an
     *     empty string if there are no more results or if you don‘t support pagination. Offset length can’t exceed 64
     *     bytes.
     * @param string $switchPmText If passed, clients will display a button with specified text that switches the user to a private chat with the
     *     bot and sends the bot a start message with the parameter switch_pm_parameter
     * @param string $switchPmParameter Deep-linking parameter for the /start message sent to the bot when user presses the switch button. 1-64
     *     characters, only A-Z, a-z, 0-9, _ and - are allowed.Example: An inline bot that sends YouTube videos can ask the
     *     user to connect the bot to their YouTube account to adapt search results accordingly. To do this, it displays a
     *     ‘Connect your YouTube account’ button above the results, or even before showing any. The user presses the
     *     button, switches to a private chat with the bot and, in doing so, passes a start parameter that instructs the bot
     *     to return an oauth link. Once done, the bot can offer a switch_inline button so that the user can easily return
     *     to the chat where they wanted to use the bot's inline capabilities.
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function answerInlineQuery(string $inlineQueryId, array $results, ?int $cacheTime = null, ?bool $isPersonal = null, ?string $nextOffset = null, ?string $switchPmText = null, ?string $switchPmParameter = null): bool;

    /**
     * Use this method to send invoices. On success, the sent Message is returned.
     *
     * @param int $chatId Unique identifier for the target private chat
     * @param string $title Product name, 1-32 characters
     * @param string $description Product description, 1-255 characters
     * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal
     *     processes.
     * @param string $providerToken Payments provider token, obtained via Botfather
     * @param string $startParameter Unique deep-linking parameter that can be used to generate this invoice when used as a start parameter
     * @param string $currency Three-letter ISO 4217 currency code, see more on currencies
     * @param LabeledPrice[] $prices Price breakdown, a list of components (e.g. product price, tax, discount, delivery cost, delivery tax, bonus,
     *     etc.)
     * @param string $providerData JSON-encoded data about the invoice, which will be shared with the payment provider. A detailed description of
     *     required fields should be provided by the payment provider.
     * @param string $photoUrl URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. People
     *     like it better when they see what they are paying for.
     * @param int $photoSize Photo size
     * @param int $photoWidth Photo width
     * @param int $photoHeight Photo height
     * @param bool $needName Pass True, if you require the user's full name to complete the order
     * @param bool $needPhoneNumber Pass True, if you require the user's phone number to complete the order
     * @param bool $needEmail Pass True, if you require the user's email address to complete the order
     * @param bool $needShippingAddress Pass True, if you require the user's shipping address to complete the order
     * @param bool $sendPhoneNumberToProvider Pass True, if user's phone number should be sent to provider
     * @param bool $sendEmailToProvider Pass True, if user's email address should be sent to provider
     * @param bool $isFlexible Pass True, if the final price depends on the shipping method
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup $replyMarkup A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be shown. If not
     *     empty, the first button must be a Pay button.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendInvoice(int $chatId, string $title, string $description, string $payload, string $providerToken, string $startParameter, string $currency, array $prices, ?string $providerData = null, ?string $photoUrl = null, ?int $photoSize = null, ?int $photoWidth = null, ?int $photoHeight = null, ?bool $needName = null, ?bool $needPhoneNumber = null, ?bool $needEmail = null, ?bool $needShippingAddress = null, ?bool $sendPhoneNumberToProvider = null, ?bool $sendEmailToProvider = null, ?bool $isFlexible = null, ?bool $disableNotification = null, ?int $replyToMessageId = null, ?InlineKeyboardMarkup $replyMarkup = null): Message;

    /**
     * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will
     * send an Update with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True
     * is returned.
     *
     * @param string $shippingQueryId Unique identifier for the query to be answered
     * @param bool $ok Specify True if delivery to the specified address is possible and False if there are any problems (for example,
     *     if delivery to the specified address is not possible)
     * @param ShippingOption[] $shippingOptions Required if ok is True. A JSON-serialized array of available shipping options.
     * @param string $errorMessage Required if ok is False. Error message in human readable form that explains why it is impossible to complete the
     *     order (e.g. "Sorry, delivery to your desired address is unavailable'). Telegram will display this message to the
     *     user.
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function answerShippingQuery(string $shippingQueryId, bool $ok, ?array $shippingOptions = null, ?string $errorMessage = null): bool;

    /**
     * Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form
     * of an Update with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success,
     * True is returned. Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
     *
     * @param string $preCheckoutQueryId Unique identifier for the query to be answered
     * @param bool $ok Specify True if everything is alright (goods are available, etc.) and the bot is ready to proceed with the order.
     *     Use False if there are any problems.
     * @param string $errorMessage Required if ok is False. Error message in human readable form that explains the reason for failure to proceed
     *     with the checkout (e.g. "Sorry, somebody just bought the last of our amazing black T-shirts while you were busy
     *     filling out your payment details. Please choose a different color or garment!"). Telegram will display this
     *     message to the user.
     * @return bool
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function answerPreCheckoutQuery(string $preCheckoutQueryId, bool $ok, ?string $errorMessage = null): bool;

    /**
     * Use this method to send a game. On success, the sent Message is returned.
     *
     * @param int $chatId Unique identifier for the target chat
     * @param string $gameShortName Short name of the game, serves as the unique identifier for the game. Set up your games via Botfather.
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param int $replyToMessageId If the message is a reply, ID of the original message
     * @param InlineKeyboardMarkup $replyMarkup A JSON-serialized object for an inline keyboard. If empty, one ‘Play game_title’ button will be shown. If not
     *     empty, the first button must launch the game.
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function sendGame(int $chatId, string $gameShortName, ?bool $disableNotification = null, ?int $replyToMessageId = null, ?InlineKeyboardMarkup $replyMarkup = null): Message;

    /**
     * Use this method to set the score of the specified user in a game. On success, if the message was sent by the bot,
     * returns the edited Message, otherwise returns True. Returns an error, if the new score is not greater than the user's
     * current score in the chat and force is False.
     *
     * @param int $userId User identifier
     * @param int $score New score, must be non-negative
     * @param bool $force Pass True, if the high score is allowed to decrease. This can be useful when fixing mistakes or banning cheaters
     * @param bool $disableEditMessage Pass True, if the game message should not be automatically edited to include the current scoreboard
     * @param int $chatId Required if inline_message_id is not specified. Unique identifier for the target chat
     * @param int $messageId Required if inline_message_id is not specified. Identifier of the sent message
     * @param string $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
     * @return Message
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function setGameScore(int $userId, int $score, ?bool $force = null, ?bool $disableEditMessage = null, ?int $chatId = null, ?int $messageId = null, ?string $inlineMessageId = null): Message;

    /**
     * Use this method to get data for high score tables. Will return the score of the specified user and several of his
     * neighbors in a game. On success, returns an Array of GameHighScore objects.
     *
     * This method will currently return scores for the target user, plus two of his closest neighbors on each side. Will
     * also return the top three users if the user and his neighbors are not among them. Please note that this behavior is
     * subject to change.
     *
     * @param int $userId Target user id
     * @param int $chatId Required if inline_message_id is not specified. Unique identifier for the target chat
     * @param int $messageId Required if inline_message_id is not specified. Identifier of the sent message
     * @param string $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the inline message
     * @return GameHighScore[]
     * @throws TelegramResponseException
     * @throws \ErrorException
     */
    public function getGameHighScores(int $userId, ?int $chatId = null, ?int $messageId = null, ?string $inlineMessageId = null): array;
}
