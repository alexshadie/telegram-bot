<?php

namespace alexshadie\TelegramBot\Query;

use alexshadie\TelegramBot\Objects\UserStub;
use alexshadie\TelegramBot\Chat\ChatStub;
use alexshadie\TelegramBot\Objects\MessageEntityStub;
use alexshadie\TelegramBot\Message\AudioStub;
use alexshadie\TelegramBot\Message\DocumentStub;
use alexshadie\TelegramBot\Game\GameStub;
use alexshadie\TelegramBot\Type\PhotoSizeStub;
use alexshadie\TelegramBot\Message\StickerStub;
use alexshadie\TelegramBot\Message\VideoStub;
use alexshadie\TelegramBot\Message\VoiceStub;
use alexshadie\TelegramBot\Message\VideoNoteStub;
use alexshadie\TelegramBot\Message\ContactStub;
use alexshadie\TelegramBot\Type\LocationStub;
use alexshadie\TelegramBot\Message\VenueStub;
use alexshadie\TelegramBot\Payment\InvoiceStub;
use alexshadie\TelegramBot\Payment\SuccessfulPaymentStub;

/**
 * Stub for Message class. Use it for testing.
 */
class MessageStub extends Message
{
    /**
     * @return Message
     */
    public static function getMessageWithCommonFields1(): Message
    {
        return new Message(
            1513026693,
            50955340,
            ChatStub::getChatWithCommonFields1()
        );
    }
    /**
     * @return Message
     */
    public static function getMessageWithCommonFields2(): Message
    {
        return new Message(
            781054682,
            550530686,
            ChatStub::getChatWithCommonFields1()
        );
    }
    /**
     * @return Message
     */
    public static function getMessageWithCommonFields3(): Message
    {
        return new Message(
            1109498889,
            1630447407,
            ChatStub::getChatWithCommonFields3()
        );
    }
    /**
     * @return Message
     */
    public static function getMessageWithAllFields1(): Message
    {
        return new Message(
            100093596,
            2068741116,
            ChatStub::getChatWithCommonFields2(),
            UserStub::getUserWithCommonFields1(),
            UserStub::getUserWithCommonFields3(),
            ChatStub::getChatWithCommonFields3(),
            352391400,
            'SCYFH3VtJr',
            25864468,
            MessageStub::getMessageWithCommonFields3(),
            197602303,
            'loa6ZdKXYh',
            'Nd03NRrd7w',
            'uUvFxAupDn',
            [MessageEntityStub::getMessageEntityWithCommonFields1(), MessageEntityStub::getMessageEntityWithCommonFields1(), MessageEntityStub::getMessageEntityWithCommonFields2()],
            [MessageEntityStub::getMessageEntityWithCommonFields2()],
            AudioStub::getAudioWithCommonFields2(),
            DocumentStub::getDocumentWithCommonFields3(),
            GameStub::getGameWithCommonFields3(),
            [PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields3()],
            StickerStub::getStickerWithCommonFields3(),
            VideoStub::getVideoWithCommonFields3(),
            VoiceStub::getVoiceWithCommonFields3(),
            VideoNoteStub::getVideoNoteWithCommonFields1(),
            'fLO5pqWegu',
            ContactStub::getContactWithCommonFields3(),
            LocationStub::getLocationWithCommonFields2(),
            VenueStub::getVenueWithCommonFields3(),
            [UserStub::getUserWithCommonFields1(), UserStub::getUserWithCommonFields2()],
            UserStub::getUserWithCommonFields3(),
            'L0bZGUcLJ7',
            [PhotoSizeStub::getPhotoSizeWithCommonFields2()],
            true,
            false,
            true,
            false,
            1816476774,
            419935477,
            MessageStub::getMessageWithCommonFields1(),
            InvoiceStub::getInvoiceWithCommonFields1(),
            SuccessfulPaymentStub::getSuccessfulPaymentWithCommonFields1(),
            'BzyPnU3pt8'
        );
    }
    /**
     * @return Message
     */
    public static function getMessageWithAllFields2(): Message
    {
        return new Message(
            1185417931,
            385365804,
            ChatStub::getChatWithCommonFields3(),
            UserStub::getUserWithCommonFields1(),
            UserStub::getUserWithCommonFields3(),
            ChatStub::getChatWithCommonFields3(),
            699280216,
            'lGawu5X1ry',
            2071984138,
            MessageStub::getMessageWithCommonFields3(),
            821868685,
            'dQPknJuwCA',
            'tui0ALM989',
            'sWKJBYAvdA',
            [MessageEntityStub::getMessageEntityWithCommonFields3(), MessageEntityStub::getMessageEntityWithCommonFields2(), MessageEntityStub::getMessageEntityWithCommonFields2()],
            [MessageEntityStub::getMessageEntityWithCommonFields2()],
            AudioStub::getAudioWithCommonFields3(),
            DocumentStub::getDocumentWithCommonFields3(),
            GameStub::getGameWithCommonFields2(),
            [PhotoSizeStub::getPhotoSizeWithCommonFields2(), PhotoSizeStub::getPhotoSizeWithCommonFields3()],
            StickerStub::getStickerWithCommonFields1(),
            VideoStub::getVideoWithCommonFields2(),
            VoiceStub::getVoiceWithCommonFields1(),
            VideoNoteStub::getVideoNoteWithCommonFields3(),
            'l8S4DgST2V',
            ContactStub::getContactWithCommonFields2(),
            LocationStub::getLocationWithCommonFields1(),
            VenueStub::getVenueWithCommonFields3(),
            [UserStub::getUserWithCommonFields3()],
            UserStub::getUserWithCommonFields1(),
            'iwSkztSVBB',
            [PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields3()],
            true,
            true,
            true,
            true,
            1202416111,
            127116784,
            MessageStub::getMessageWithCommonFields3(),
            InvoiceStub::getInvoiceWithCommonFields3(),
            SuccessfulPaymentStub::getSuccessfulPaymentWithCommonFields1(),
            'kmLX8hzRQA'
        );
    }
    /**
     * @return Message
     */
    public static function getMessageWithAllFields3(): Message
    {
        return new Message(
            1919516922,
            1937333996,
            ChatStub::getChatWithCommonFields1(),
            UserStub::getUserWithCommonFields2(),
            UserStub::getUserWithCommonFields2(),
            ChatStub::getChatWithCommonFields3(),
            921928849,
            'R5p3azXE0Z',
            826398172,
            MessageStub::getMessageWithCommonFields3(),
            146693279,
            '8jnHLa9N2t',
            'EhJ8lq9DqU',
            'gMZA97tRrh',
            [MessageEntityStub::getMessageEntityWithCommonFields1(), MessageEntityStub::getMessageEntityWithCommonFields3(), MessageEntityStub::getMessageEntityWithCommonFields2()],
            [MessageEntityStub::getMessageEntityWithCommonFields1(), MessageEntityStub::getMessageEntityWithCommonFields1()],
            AudioStub::getAudioWithCommonFields3(),
            DocumentStub::getDocumentWithCommonFields3(),
            GameStub::getGameWithCommonFields2(),
            [PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields1()],
            StickerStub::getStickerWithCommonFields1(),
            VideoStub::getVideoWithCommonFields3(),
            VoiceStub::getVoiceWithCommonFields3(),
            VideoNoteStub::getVideoNoteWithCommonFields2(),
            'OVkQJbyoNx',
            ContactStub::getContactWithCommonFields3(),
            LocationStub::getLocationWithCommonFields1(),
            VenueStub::getVenueWithCommonFields3(),
            [UserStub::getUserWithCommonFields3(), UserStub::getUserWithCommonFields3(), UserStub::getUserWithCommonFields3()],
            UserStub::getUserWithCommonFields3(),
            'ihpV6elN7A',
            [PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields2()],
            true,
            false,
            false,
            true,
            1448241514,
            2111560664,
            MessageStub::getMessageWithCommonFields2(),
            InvoiceStub::getInvoiceWithCommonFields1(),
            SuccessfulPaymentStub::getSuccessfulPaymentWithCommonFields1(),
            'WWxhi2LjVQ'
        );
    }
}
