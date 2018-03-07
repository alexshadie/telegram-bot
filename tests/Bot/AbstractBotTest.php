<?php

namespace alexshadie\TelegramBot\Bot;

use alexshadie\TelegramBot\MessageDispatcher\MessageDispatcher;
use alexshadie\TelegramBot\MessageDispatcher\MessageDispatcherInterface;
use alexshadie\TelegramBot\Objects\User;
use alexshadie\TelegramBot\Query\Message;
use alexshadie\TelegramBot\Query\Update;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class BotStub extends AbstractBot
{
}

class AbstractBotTest extends TestCase
{
    /** @var AbstractBot */
    private $bot;
    /** @var BotApiInterface|MockObject */
    private $botApi;
    /** @var LoggerInterface|MockObject */
    private $logger;
    /** @var MessageDispatcher|MockObject */
    private $messageDispatcher;

    public function setUp()
    {
        parent::setUp();

        $this->logger = $this->getMockBuilder(LoggerInterface::class)
            ->getMock();
        $this->messageDispatcher = $this->getMockBuilder(MessageDispatcherInterface::class)
            ->getMock();
        $this->botApi = $this->getMockBuilder(BotApiInterface::class)
            ->getMock();
    }

    /**
     * @param bool $withLogger
     * @param bool $withApi
     * @param bool $withDispatcher
     * @return AbstractBot
     */
    private function getBot(bool $withLogger, bool $withApi, bool $withDispatcher)
    {
        $bot = new BotStub();
        $withLogger && $bot->setLogger($this->logger);
        $withApi && $bot->setBotApi($this->botApi);
        $withDispatcher && $bot->setMessageDispatcher($this->messageDispatcher);
        return $bot;
    }

    public function testSetBotApi()
    {
        $bot = $this->getBot(1, 1, 1);
        $class = new \ReflectionClass($bot);
        $prop = $class->getProperty('botApi');
        $prop->setAccessible(true);
        $this->assertEquals($this->botApi, $prop->getValue($bot));
    }

    public function testSetLogger()
    {
        $bot = $this->getBot(1, 1, 1);
        $class = new \ReflectionClass($bot);
        $prop = $class->getProperty('logger');
        $prop->setAccessible(true);
        $this->assertEquals($this->logger, $prop->getValue($bot));
    }

    public function testSetMessageDispatcher()
    {
        $bot = $this->getBot(1, 1, 1);
        $class = new \ReflectionClass($bot);
        $prop = $class->getProperty('messageDispatcher');
        $prop->setAccessible(true);
        $this->assertEquals($this->messageDispatcher, $prop->getValue($bot));
    }

    /**
     * @expectedException \alexshadie\TelegramBot\Bot\Exception\BotException
     * @expectedExceptionMessage Invalid bot configuration
     */
    public function testHandleUpdateWithoutDispatcher()
    {
        $bot = $this->getBot(1, 1, 0);
        $update = $this->getMockBuilder(Update::class)
            ->getMock();
        $update->expects($this->never())
            ->method('getMessage');
        $bot->handleUpdate($update);
    }

    /**
     * @expectedException \alexshadie\TelegramBot\Bot\Exception\BotException
     * @expectedExceptionMessage Invalid bot configuration
     */
    public function testHandleUpdateWithoutApi()
    {
        $bot = $this->getBot(1, 0, 1);
        $update = $this->getMockBuilder(Update::class)
            ->getMock();
        $update->expects($this->never())
            ->method('getMessage');
        $bot->handleUpdate($update);
    }

    public function testHandleUpdate()
    {
        $bot = $this->getBot(1, 1, 1);

        $message = $this->getMockBuilder(Message::class)->getMock();

        $update = $this->getMockBuilder(Update::class)
            ->getMock();
        $update->expects($this->exactly(2))
            ->method('getMessage')
            ->willReturn($message);

        $this->messageDispatcher->expects($this->once())
            ->method('dispatch')
            ->with($message);

        $this->logger->expects($this->once())
            ->method('debug')
            ->with('Message received');

        $this->assertTrue($bot->handleUpdate($update));
    }

    public function testHandleUpdateWithoutLogger()
    {
        $bot = $this->getBot(0, 1, 1);

        $message = $this->getMockBuilder(Message::class)->getMock();

        $update = $this->getMockBuilder(Update::class)
            ->getMock();
        $update->expects($this->exactly(2))
            ->method('getMessage')
            ->willReturn($message);

        $this->messageDispatcher->expects($this->once())
            ->method('dispatch')
            ->with($message);

        $this->assertTrue($bot->handleUpdate($update));
    }

    public function testHandleUpdateWithoutMessage() {
        $bot = $this->getBot(1, 1, 1);

        $update = $this->getMockBuilder(Update::class)
            ->getMock();
        $update->expects($this->once())
            ->method('getMessage')
            ->willReturn(null);

        $this->logger->expects($this->once())
            ->method('debug')
            ->with('Unsupported query');

        $this->assertFalse($bot->handleUpdate($update));
    }

    public function testHandleUpdateWithoutMessageWithoutLogger() {
        $bot = $this->getBot(0, 1, 1);

        $update = $this->getMockBuilder(Update::class)
            ->getMock();
        $update->expects($this->once())
            ->method('getMessage')
            ->willReturn(null);

        $this->assertFalse($bot->handleUpdate($update));
    }

    /**
     * @expectedException \alexshadie\TelegramBot\Bot\Exception\BotException
     * @expectedExceptionMessage Invalid bot configuration
     */
    public function testMeWithoutApi()
    {
        $bot = $this->getBot(1,0,1);

        $this->botApi->expects($this->never())
            ->method('getMe');

        $bot->me();
    }

    public function testMe()
    {
        $bot = $this->getBot(1,1,1);

        $user = $this->getMockBuilder(User::class)
            ->getMock();

        $this->botApi->expects($this->once())
            ->method('getMe')
            ->willReturn($user);

        $this->assertEquals($user, $bot->me());
    }

    /**
     * @expectedException \alexshadie\TelegramBot\Bot\Exception\BotException
     * @expectedExceptionMessage Invalid bot configuration
     */
    public function testSayWithoutApi()
    {
        $bot = $this->getBot(1,0,1);

        $message = $this->getMockBuilder(Message::class)
            ->getMock();

        $this->botApi->expects($this->never())
            ->method('message');

        $this->assertEquals($message, $bot->say(123, "name"));
    }

    public function testSay()
    {
        $bot = $this->getBot(1,1,1);

        $message = $this->getMockBuilder(Message::class)
            ->getMock();

        $this->botApi->expects($this->once())
            ->method('message')
            ->with(123, "name")
            ->willReturn($message);

        $this->assertEquals($message, $bot->say(123, "name"));
    }
}
