<?php

namespace alexshadie\TelegramBot\Payment;

use PHPUnit\Framework\TestCase;
class ShippingAddressTest extends TestCase
{
    public function testConstructShippingAddressWithCommonFields()
    {
        $obj = new ShippingAddress(
            'mcWPIx4keY',
            'GBvX1owTUq',
            'x33OoEiSxR',
            'GrEstgzjM5',
            'gafCTeCy3L',
            'iRfLjyiR7Y'
        );
        $this->assertEquals('mcWPIx4keY', $obj->getCountryCode());
        $this->assertEquals('GBvX1owTUq', $obj->getState());
        $this->assertEquals('x33OoEiSxR', $obj->getCity());
        $this->assertEquals('GrEstgzjM5', $obj->getStreetLine1());
        $this->assertEquals('gafCTeCy3L', $obj->getStreetLine2());
        $this->assertEquals('iRfLjyiR7Y', $obj->getPostCode());
    }

    public function testConstructShippingAddressWithAllFields()
    {
        $obj = new ShippingAddress(
            'Hq4uPDAZyl',
            'HFzNlK0RDC',
            'mqdEGGb6P0',
            'hCUIrzei5M',
            '0fjvbEUVpv',
            'WTqw5k6GlR'
        );
        $this->assertEquals('Hq4uPDAZyl', $obj->getCountryCode());
        $this->assertEquals('HFzNlK0RDC', $obj->getState());
        $this->assertEquals('mqdEGGb6P0', $obj->getCity());
        $this->assertEquals('hCUIrzei5M', $obj->getStreetLine1());
        $this->assertEquals('0fjvbEUVpv', $obj->getStreetLine2());
        $this->assertEquals('WTqw5k6GlR', $obj->getPostCode());
    }
}
