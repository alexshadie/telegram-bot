<?php

namespace alexshadie\TelegramBot\Objects;

use PHPUnit\Framework\TestCase;
class WebhookInfoTest extends TestCase
{
    public function testConstructWebhookInfoWithCommonFields()
    {
        $obj = new WebhookInfo(
            'oi8CsplnwG',
            false,
            1223306057
        );
        $this->assertEquals('oi8CsplnwG', $obj->getUrl());
        $this->assertEquals(false, $obj->getHasCustomCertificate());
        $this->assertEquals(1223306057, $obj->getPendingUpdateCount());
        $this->assertNull($obj->getLastErrorDate());
        $this->assertNull($obj->getLastErrorMessage());
        $this->assertNull($obj->getMaxConnections());
        $this->assertNull($obj->getAllowedUpdates());
    }

    public function testConstructWebhookInfoWithAllFields()
    {
        $obj = new WebhookInfo(
            'rJJD8x3Koz',
            true,
            1168320130,
            928035863,
            'GPQTSfwkZ6',
            769066628,
            ['tgUN1ZAs50']
        );
        $this->assertEquals('rJJD8x3Koz', $obj->getUrl());
        $this->assertEquals(true, $obj->getHasCustomCertificate());
        $this->assertEquals(1168320130, $obj->getPendingUpdateCount());
        $this->assertEquals(928035863, $obj->getLastErrorDate());
        $this->assertEquals('GPQTSfwkZ6', $obj->getLastErrorMessage());
        $this->assertEquals(769066628, $obj->getMaxConnections());
        $this->assertEquals(['tgUN1ZAs50'], $obj->getAllowedUpdates());
    }
}
