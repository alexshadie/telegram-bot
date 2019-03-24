<?php

namespace alexshadie\TelegramBot\Bot;


use alexshadie\TelegramBot\Objects\InputFile;
use alexshadie\TelegramBot\TestUtils;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class BotApiTest extends TestCase
{
    /** @var BotApi|MockObject */
    private $botApi;
    /** @var LoggerInterface|MockObject */
    private $logger;

    public function setUp() {
        $this->logger = $this->getMockBuilder(LoggerInterface::class)
            ->getMock();

        $this->botApi = $this->getMockBuilder(BotApi::class)
            ->setConstructorArgs(["bot_name", "bot_key", $this->logger])
            ->setMethods(['query'])
            ->getMock();
    }

    public function testConstruct()
    {
        $class = new \ReflectionClass(BotApi::class);
        $nameProp = $class->getProperty("bot_name");
        $nameProp->setAccessible(true);
        $keyProp = $class->getProperty("bot_key");
        $keyProp->setAccessible(true);
        $loggerProp = $class->getProperty("logger");
        $loggerProp->setAccessible(true);

        $botApi = new BotApi("bot_name", "bot_key", 'https://api.telegram.org');

        $this->assertEquals("bot_name", $nameProp->getValue($botApi));
        $this->assertEquals("bot_key", $keyProp->getValue($botApi));
        $this->assertNull($loggerProp->getValue($botApi));

        $botApi = new BotApi("bot_name_1", "bot_key_1", "https://api.telegram.org", $this->logger);
        $this->assertEquals("bot_name_1", $nameProp->getValue($botApi));
        $this->assertEquals("bot_key_1", $keyProp->getValue($botApi));
        $this->assertEquals($this->logger, $loggerProp->getValue($botApi));
    }

    public function testMessage()
    {
        $message = new \stdClass();
        $message->result = new \stdClass();
        $message->result->message_id = 12345;
        $message->result->date = 100500;
        $message->result->chat = new \stdClass();
        $message->result->chat->id = 101;
        $message->result->chat->type = "private";

        $this->botApi->expects($this->once())
            ->method('query')
            ->with('sendMessage', ['chat_id' => 12345, 'text' => 'Test text'])
            ->willReturn($message);

        $responseMessage = $this->botApi->sendMessage(12345, 'Test text');
        $this->assertEquals(12345, $responseMessage->getMessageId());
    }

    public function testGetMe()
    {
        $user = new \stdClass();
        $user->result = new \stdClass();
        $user->result->id = 123;
        $user->result->is_bot = true;
        $user->result->first_name = "first";

        $this->botApi->expects($this->once())
            ->method('query')
            ->with("getMe")
            ->willReturn($user);

        $responseUser = $this->botApi->getMe();

        $this->assertEquals(123, $responseUser->getId());
        $this->assertEquals(true, $responseUser->getIsBot());
    }

    public function testGetFile()
    {
        $file = new \stdClass();
        $file->result = new \stdClass();
        $file->result->file_id = 123456;

        $this->botApi->expects($this->once())
            ->method('query')
            ->with("getFile", ['file_id' => 123])
            ->willReturn($file);

        $responseFile = $this->botApi->getFile(123);

        $this->assertEquals(123456, $responseFile->getFileId());
    }

    public function testDownloadFile()
    {
        $this->markTestSkipped();
        // TODO: Test file download
    }

    public function testRegisterWebHook()
    {
        $data = new \stdClass();
        $data->description = 'server said yes';
        $data->result = true;

        $this->botApi->expects($this->once())
            ->method('query')
            ->with("setWebhook", ['url' => "test_endpoint", 'certificate' => new InputFile(TestUtils::getResourcePath() . "test.crt")])
            ->willReturn($data);

        $this->logger->expects($this->once())
            ->method('info')
            ->with("Webhook set with message 'server said yes'");

        $result = $this->botApi->registerWebHook("test_endpoint", TestUtils::getResourcePath() . "test.crt");

        $this->assertTrue($result);
    }

    public function testDropWebHook()
    {
        $data = new \stdClass();
        $data->description = 'server said yes';
        $data->result = true;

        $this->botApi->expects($this->once())
            ->method('query')
            ->with("setWebhook", ['url' => ""])
            ->willReturn($data);

        $this->logger->expects($this->once())
            ->method('info')
            ->with("Webhook unset with message 'server said yes'");

        $result = $this->botApi->dropWebHook();

        $this->assertTrue($result);
    }

    public function testGetUpdates()
    {
        $this->markTestSkipped();
    }
}
