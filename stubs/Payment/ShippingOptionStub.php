<?php

namespace alexshadie\TelegramBot\Payment;


/**
 * Stub for ShippingOption class. Use it for testing.
 */
class ShippingOptionStub extends ShippingOption
{
    /**
     * @return ShippingOption
     */
    public static function getShippingOptionWithCommonFields1(): ShippingOption
    {
        return new ShippingOption(
            '7GHhz8HaUz',
            'n1Ggv585e5',
            [LabeledPriceStub::getLabeledPriceWithCommonFields1(), LabeledPriceStub::getLabeledPriceWithCommonFields2()]
        );
    }
    /**
     * @return ShippingOption
     */
    public static function getShippingOptionWithCommonFields2(): ShippingOption
    {
        return new ShippingOption(
            'fv01IeBk3g',
            '6HBpyAjNZF',
            [LabeledPriceStub::getLabeledPriceWithCommonFields2()]
        );
    }
    /**
     * @return ShippingOption
     */
    public static function getShippingOptionWithCommonFields3(): ShippingOption
    {
        return new ShippingOption(
            'PI0yHo095H',
            'atBXmwcy0c',
            [LabeledPriceStub::getLabeledPriceWithCommonFields1()]
        );
    }
    /**
     * @return ShippingOption
     */
    public static function getShippingOptionWithAllFields1(): ShippingOption
    {
        return new ShippingOption(
            'RrB654JLg9',
            'Qoc1yC1ayf',
            [LabeledPriceStub::getLabeledPriceWithCommonFields3(), LabeledPriceStub::getLabeledPriceWithCommonFields3()]
        );
    }
    /**
     * @return ShippingOption
     */
    public static function getShippingOptionWithAllFields2(): ShippingOption
    {
        return new ShippingOption(
            'AsmiG0NX52',
            'UKDE00zvAE',
            [LabeledPriceStub::getLabeledPriceWithCommonFields2(), LabeledPriceStub::getLabeledPriceWithCommonFields3()]
        );
    }
    /**
     * @return ShippingOption
     */
    public static function getShippingOptionWithAllFields3(): ShippingOption
    {
        return new ShippingOption(
            'vCn7tnkIAR',
            'kV1hPBQRtz',
            [LabeledPriceStub::getLabeledPriceWithCommonFields2()]
        );
    }
}
