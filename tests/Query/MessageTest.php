<?php

namespace alexshadie\TelegramBot\Query;

use PHPUnit\Framework\TestCase;
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

class MessageTest extends TestCase
{
    public function testConstructMessageWithCommonFields()
    {
        $obj = new Message(
            451022748,
            305577165,
            ChatStub::getChatWithCommonFields3()
        );
        $this->assertEquals(451022748, $obj->getMessageId());
        $this->assertNull($obj->getFrom());
        $this->assertEquals(305577165, $obj->getDate());
        $this->assertEquals(ChatStub::getChatWithCommonFields3(), $obj->getChat());
        $this->assertNull($obj->getForwardFrom());
        $this->assertNull($obj->getForwardFromChat());
        $this->assertNull($obj->getForwardFromMessageId());
        $this->assertNull($obj->getForwardSignature());
        $this->assertNull($obj->getForwardDate());
        $this->assertNull($obj->getReplyToMessage());
        $this->assertNull($obj->getEditDate());
        $this->assertNull($obj->getMediaGroupId());
        $this->assertNull($obj->getAuthorSignature());
        $this->assertNull($obj->getText());
        $this->assertNull($obj->getEntities());
        $this->assertNull($obj->getCaptionEntities());
        $this->assertNull($obj->getAudio());
        $this->assertNull($obj->getDocument());
        $this->assertNull($obj->getGame());
        $this->assertNull($obj->getPhoto());
        $this->assertNull($obj->getSticker());
        $this->assertNull($obj->getVideo());
        $this->assertNull($obj->getVoice());
        $this->assertNull($obj->getVideoNote());
        $this->assertNull($obj->getCaption());
        $this->assertNull($obj->getContact());
        $this->assertNull($obj->getLocation());
        $this->assertNull($obj->getVenue());
        $this->assertNull($obj->getNewChatMembers());
        $this->assertNull($obj->getLeftChatMember());
        $this->assertNull($obj->getNewChatTitle());
        $this->assertNull($obj->getNewChatPhoto());
        $this->assertNull($obj->getDeleteChatPhoto());
        $this->assertNull($obj->getGroupChatCreated());
        $this->assertNull($obj->getSupergroupChatCreated());
        $this->assertNull($obj->getChannelChatCreated());
        $this->assertNull($obj->getMigrateToChatId());
        $this->assertNull($obj->getMigrateFromChatId());
        $this->assertNull($obj->getPinnedMessage());
        $this->assertNull($obj->getInvoice());
        $this->assertNull($obj->getSuccessfulPayment());
        $this->assertNull($obj->getConnectedWebsite());
    }

    public function testConstructMessageWithAllFields()
    {
        $obj = new Message(
            1010095946,
            1132465293,
            ChatStub::getChatWithCommonFields2(),
            UserStub::getUserWithCommonFields1(),
            UserStub::getUserWithCommonFields1(),
            ChatStub::getChatWithCommonFields3(),
            915652138,
            'lNThPrV1Av',
            362101947,
            MessageStub::getMessageWithCommonFields1(),
            420287488,
            'qyWdbOtOI4',
            'qdYZemSWwB',
            'PcQequ2CT8',
            [MessageEntityStub::getMessageEntityWithCommonFields1(), MessageEntityStub::getMessageEntityWithCommonFields1()],
            [MessageEntityStub::getMessageEntityWithCommonFields2(), MessageEntityStub::getMessageEntityWithCommonFields3(), MessageEntityStub::getMessageEntityWithCommonFields3()],
            AudioStub::getAudioWithCommonFields3(),
            DocumentStub::getDocumentWithCommonFields2(),
            GameStub::getGameWithCommonFields2(),
            [PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields2()],
            StickerStub::getStickerWithCommonFields2(),
            VideoStub::getVideoWithCommonFields2(),
            VoiceStub::getVoiceWithCommonFields1(),
            VideoNoteStub::getVideoNoteWithCommonFields2(),
            'NiX1DljMLn',
            ContactStub::getContactWithCommonFields3(),
            LocationStub::getLocationWithCommonFields2(),
            VenueStub::getVenueWithCommonFields3(),
            [UserStub::getUserWithCommonFields3()],
            UserStub::getUserWithCommonFields2(),
            '81udcB2Jzu',
            [PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields1()],
            true,
            true,
            false,
            true,
            511285544,
            909776457,
            MessageStub::getMessageWithCommonFields3(),
            InvoiceStub::getInvoiceWithCommonFields3(),
            SuccessfulPaymentStub::getSuccessfulPaymentWithCommonFields1(),
            'jitZLAeoKg'
        );
        $this->assertEquals(1010095946, $obj->getMessageId());
        $this->assertEquals(UserStub::getUserWithCommonFields1(), $obj->getFrom());
        $this->assertEquals(1132465293, $obj->getDate());
        $this->assertEquals(ChatStub::getChatWithCommonFields2(), $obj->getChat());
        $this->assertEquals(UserStub::getUserWithCommonFields1(), $obj->getForwardFrom());
        $this->assertEquals(ChatStub::getChatWithCommonFields3(), $obj->getForwardFromChat());
        $this->assertEquals(915652138, $obj->getForwardFromMessageId());
        $this->assertEquals('lNThPrV1Av', $obj->getForwardSignature());
        $this->assertEquals(362101947, $obj->getForwardDate());
        $this->assertEquals(MessageStub::getMessageWithCommonFields1(), $obj->getReplyToMessage());
        $this->assertEquals(420287488, $obj->getEditDate());
        $this->assertEquals('qyWdbOtOI4', $obj->getMediaGroupId());
        $this->assertEquals('qdYZemSWwB', $obj->getAuthorSignature());
        $this->assertEquals('PcQequ2CT8', $obj->getText());
        $this->assertEquals([MessageEntityStub::getMessageEntityWithCommonFields1(), MessageEntityStub::getMessageEntityWithCommonFields1()], $obj->getEntities());
        $this->assertEquals([MessageEntityStub::getMessageEntityWithCommonFields2(), MessageEntityStub::getMessageEntityWithCommonFields3(), MessageEntityStub::getMessageEntityWithCommonFields3()], $obj->getCaptionEntities());
        $this->assertEquals(AudioStub::getAudioWithCommonFields3(), $obj->getAudio());
        $this->assertEquals(DocumentStub::getDocumentWithCommonFields2(), $obj->getDocument());
        $this->assertEquals(GameStub::getGameWithCommonFields2(), $obj->getGame());
        $this->assertEquals([PhotoSizeStub::getPhotoSizeWithCommonFields3(), PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields2()], $obj->getPhoto());
        $this->assertEquals(StickerStub::getStickerWithCommonFields2(), $obj->getSticker());
        $this->assertEquals(VideoStub::getVideoWithCommonFields2(), $obj->getVideo());
        $this->assertEquals(VoiceStub::getVoiceWithCommonFields1(), $obj->getVoice());
        $this->assertEquals(VideoNoteStub::getVideoNoteWithCommonFields2(), $obj->getVideoNote());
        $this->assertEquals('NiX1DljMLn', $obj->getCaption());
        $this->assertEquals(ContactStub::getContactWithCommonFields3(), $obj->getContact());
        $this->assertEquals(LocationStub::getLocationWithCommonFields2(), $obj->getLocation());
        $this->assertEquals(VenueStub::getVenueWithCommonFields3(), $obj->getVenue());
        $this->assertEquals([UserStub::getUserWithCommonFields3()], $obj->getNewChatMembers());
        $this->assertEquals(UserStub::getUserWithCommonFields2(), $obj->getLeftChatMember());
        $this->assertEquals('81udcB2Jzu', $obj->getNewChatTitle());
        $this->assertEquals([PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields1()], $obj->getNewChatPhoto());
        $this->assertEquals(true, $obj->getDeleteChatPhoto());
        $this->assertEquals(true, $obj->getGroupChatCreated());
        $this->assertEquals(false, $obj->getSupergroupChatCreated());
        $this->assertEquals(true, $obj->getChannelChatCreated());
        $this->assertEquals(511285544, $obj->getMigrateToChatId());
        $this->assertEquals(909776457, $obj->getMigrateFromChatId());
        $this->assertEquals(MessageStub::getMessageWithCommonFields3(), $obj->getPinnedMessage());
        $this->assertEquals(InvoiceStub::getInvoiceWithCommonFields3(), $obj->getInvoice());
        $this->assertEquals(SuccessfulPaymentStub::getSuccessfulPaymentWithCommonFields1(), $obj->getSuccessfulPayment());
        $this->assertEquals('jitZLAeoKg', $obj->getConnectedWebsite());
    }
}
