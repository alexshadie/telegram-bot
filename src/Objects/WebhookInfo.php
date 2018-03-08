<?php

namespace alexshadie\TelegramBot\Objects;

/**
 * Contains information about the current status of a webhook.
 *
 * 
 *
 * Available types
 *
 * All types used in the Bot API responses are represented as JSON-objects.
 *
 * It is safe to use 32-bit signed integers for storing all Integer fields unless otherwise noted.
 *
 * 
 *
 * Optional fields may be not returned when irrelevant.
 *
 */
class WebhookInfo extends Object
{
    /**
     * Webhook URL, may be empty if webhook is not set up
     *
     * @var string
     */
    private $url;

    /**
     * True, if a custom certificate was provided for webhook certificate checks
     *
     * @var bool
     */
    private $has_custom_certificate;

    /**
     * Number of updates awaiting delivery
     *
     * @var int
     */
    private $pending_update_count;

    /**
     * Unix time for the most recent error that happened when trying to deliver an update via webhook
     *
     * @var int|null
     */
    private $last_error_date;

    /**
     * Error message in human-readable format for the most recent error that happened when trying to deliver an update via
     * webhook
     *
     * @var string|null
     */
    private $last_error_message;

    /**
     * Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     *
     * @var int|null
     */
    private $max_connections;

    /**
     * A list of update types the bot is subscribed to. Defaults to all update types
     *
     * @var string[]|null
     */
    private $allowed_updates;

    /**
     * WebhookInfo constructor.
     *
     * @param string $url
     * @param bool $hasCustomCertificate
     * @param int $pendingUpdateCount
     * @param int|null $lastErrorDate
     * @param string|null $lastErrorMessage
     * @param int|null $maxConnections
     * @param string[]|null $allowedUpdates
     */
    public function __construct(string $url, bool $hasCustomCertificate, int $pendingUpdateCount, ?int $lastErrorDate = null, ?string $lastErrorMessage = null, ?int $maxConnections = null, ?array $allowedUpdates = null)
    {
        $this->url = $url;
        $this->has_custom_certificate = $hasCustomCertificate;
        $this->pending_update_count = $pendingUpdateCount;
        $this->last_error_date = $lastErrorDate;
        $this->last_error_message = $lastErrorMessage;
        $this->max_connections = $maxConnections;
        $this->allowed_updates = $allowedUpdates;
    }

    /**
     * Webhook URL, may be empty if webhook is not set up
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * True, if a custom certificate was provided for webhook certificate checks
     *
     * @return bool
     */
    public function getHasCustomCertificate(): bool
    {
        return $this->has_custom_certificate;
    }

    /**
     * Number of updates awaiting delivery
     *
     * @return int
     */
    public function getPendingUpdateCount(): int
    {
        return $this->pending_update_count;
    }

    /**
     * Unix time for the most recent error that happened when trying to deliver an update via webhook
     *
     * @return int|null
     */
    public function getLastErrorDate(): ?int
    {
        return $this->last_error_date;
    }

    /**
     * Error message in human-readable format for the most recent error that happened when trying to deliver an update via
     * webhook
     *
     * @return string|null
     */
    public function getLastErrorMessage(): ?string
    {
        return $this->last_error_message;
    }

    /**
     * Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     *
     * @return int|null
     */
    public function getMaxConnections(): ?int
    {
        return $this->max_connections;
    }

    /**
     * A list of update types the bot is subscribed to. Defaults to all update types
     *
     * @return string[]|null
     */
    public function getAllowedUpdates(): ?array
    {
        return $this->allowed_updates;
    }

    /**
      * Creates WebhookInfo object from data.
      * @param \stdClass $data
      * @return WebhookInfo
      */
    public static function createFromObject(?\stdClass $data): ?WebhookInfo
    {
        if (is_null($data)) {
            return null;
        }
        $object = new WebhookInfo(
            $data->url,
            $data->has_custom_certificate,
            $data->pending_update_count
        );

        $object->last_error_date = $data->last_error_date ?? null;
        $object->last_error_message = $data->last_error_message ?? null;
        $object->max_connections = $data->max_connections ?? null;
        $object->allowed_updates = $data->allowed_updates ?? null;

        return $object;
    }

    /**
      * Creates array of WebhookInfo objects from data.
      * @param array $data
      * @return WebhookInfo[]
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
