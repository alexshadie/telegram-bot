<?php

namespace alexshadie\TelegramBot\Objects;


/**
 * Stub for WebhookInfo class. Use it for testing.
 */
class WebhookInfoStub extends WebhookInfo
{
    /**
     * @return WebhookInfo
     */
    public static function getWebhookInfoWithCommonFields1(): WebhookInfo
    {
        return new WebhookInfo(
            'HSpnD5kYve',
            true,
            1251182888
        );
    }
    /**
     * @return WebhookInfo
     */
    public static function getWebhookInfoWithCommonFields2(): WebhookInfo
    {
        return new WebhookInfo(
            'ZZmBTtGH1y',
            false,
            1998691970
        );
    }
    /**
     * @return WebhookInfo
     */
    public static function getWebhookInfoWithCommonFields3(): WebhookInfo
    {
        return new WebhookInfo(
            'slB1wRdhhs',
            false,
            396590422
        );
    }
    /**
     * @return WebhookInfo
     */
    public static function getWebhookInfoWithAllFields1(): WebhookInfo
    {
        return new WebhookInfo(
            'ziZ8rKmyUB',
            true,
            2034958599,
            246288467,
            'oUlvvjzOLa',
            324272920,
            ['pXFNRTLZsV']
        );
    }
    /**
     * @return WebhookInfo
     */
    public static function getWebhookInfoWithAllFields2(): WebhookInfo
    {
        return new WebhookInfo(
            'AjAVnTlrg0',
            true,
            597421082,
            999395462,
            'QWkfN3fCm4',
            2045248530,
            ['2hWUjTk58c', 'ixbJCJdKKy']
        );
    }
    /**
     * @return WebhookInfo
     */
    public static function getWebhookInfoWithAllFields3(): WebhookInfo
    {
        return new WebhookInfo(
            'rqKPFprmxN',
            false,
            552221090,
            552417158,
            'fwJzZ1w2bJ',
            1994203602,
            ['fP1QQK3cNf', 'BDQ6cIZe39']
        );
    }
}
