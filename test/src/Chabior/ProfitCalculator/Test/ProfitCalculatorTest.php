<?php

namespace Chabior\ProfitCalculator\Test;

use Chabior\ProfitCalculator\Enum\TipStatusEnum;
use Chabior\ProfitCalculator\Factory\CalculatorFactory;
use Chabior\ProfitCalculator\ProfitCalculator;
use Money\Currency;
use Money\Money;
use phpunit\framework\TestCase;

/**
 * Class ProfitCalculatorTest
 */
class ProfitCalculatorTest extends TestCase
{
    /**
     * @var ProfitCalculator
     */
    protected $profitCalculator;

    public function setUp()
    {
        $this->profitCalculator = new ProfitCalculator(new CalculatorFactory(new Currency('EUR')));
    }

    /**
     * @param $stake
     * @param $odd
     * @param $status
     * @param $expected
     * @dataProvider tipProvider
     */
    public function testCalculate($stake, $odd, $status, $expected)
    {
        $this->assertEquals(
            $expected,
            $this->profitCalculator->calculate($status, $odd, $stake)
        );
    }

    public function tipProvider()
    {
        return array(
            0 => array (
                new Money(10000, new Currency('EUR')),
                3.2,
                TipStatusEnum::LOST,
                new Money(0, new Currency('EUR'))
            ),
            1 => array (
                new Money(50000, new Currency('EUR')),
                2.00,
                TipStatusEnum::WON,
                new Money(50000, new Currency('EUR')),
            ),
            2 => array (
                new Money(10000, new Currency('EUR')),
                8.30,
                TipStatusEnum::HALF_WON,
                new Money(36500, new Currency('EUR')),
            ),
            3 => array (
                new Money(20000, new Currency('EUR')),
                5.56,
                TipStatusEnum::HALF_LOST,
                new Money(10000, new Currency('EUR')),
            ),
            4 => array (
                new Money(30000, new Currency('EUR')),
                1.90,
                TipStatusEnum::VOIDED,
                new Money(30000, new Currency('EUR')),
            ),
            5 => array (
                new Money(50000, new Currency('EUR')),
                4.21,
                TipStatusEnum::WON,
                new Money(160500, new Currency('EUR')),
            ),
        );
    }
}