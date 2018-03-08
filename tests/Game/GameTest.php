<?php

namespace alexshadie\TelegramBot\Game;

use PHPUnit\Framework\TestCase;
use alexshadie\TelegramBot\Type\PhotoSizeStub;
use alexshadie\TelegramBot\Objects\MessageEntityStub;

class GameTest extends TestCase
{
    public function testConstructGameWithCommonFields()
    {
        $obj = new Game(
            'm9MhpxU8WD',
            '3jpjlAx7Fu',
            [PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields2(), PhotoSizeStub::getPhotoSizeWithCommonFields3()]
        );
        $this->assertEquals('m9MhpxU8WD', $obj->getTitle());
        $this->assertEquals('3jpjlAx7Fu', $obj->getDescription());
        $this->assertEquals([PhotoSizeStub::getPhotoSizeWithCommonFields1(), PhotoSizeStub::getPhotoSizeWithCommonFields2(), PhotoSizeStub::getPhotoSizeWithCommonFields3()], $obj->getPhoto());
        $this->assertNull($obj->getText());
        $this->assertNull($obj->getTextEntities());
        $this->assertNull($obj->getAnimation());
    }

    public function testConstructGameWithAllFields()
    {
        $obj = new Game(
            'Q5wBBd6vNd',
            'd20fq0bu3F',
            [PhotoSizeStub::getPhotoSizeWithCommonFields2()],
            '6iR3TLjwQc',
            [MessageEntityStub::getMessageEntityWithCommonFields1(), MessageEntityStub::getMessageEntityWithCommonFields1()],
            AnimationStub::getAnimationWithCommonFields3()
        );
        $this->assertEquals('Q5wBBd6vNd', $obj->getTitle());
        $this->assertEquals('d20fq0bu3F', $obj->getDescription());
        $this->assertEquals([PhotoSizeStub::getPhotoSizeWithCommonFields2()], $obj->getPhoto());
        $this->assertEquals('6iR3TLjwQc', $obj->getText());
        $this->assertEquals([MessageEntityStub::getMessageEntityWithCommonFields1(), MessageEntityStub::getMessageEntityWithCommonFields1()], $obj->getTextEntities());
        $this->assertEquals(AnimationStub::getAnimationWithCommonFields3(), $obj->getAnimation());
    }
}
