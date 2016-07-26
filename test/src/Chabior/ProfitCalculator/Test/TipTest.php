<?php

namespace Chabior\ProfitCalculator\Test;

use Chabior\ProfitCalculator\Enum\TipStatusEnum;
use Chabior\ProfitCalculator\Factory\CalculatorFactory;
use Chabior\ProfitCalculator\ProfitCalculator;
use Chabior\ProfitCalculator\Tip;
use Money\Currency;
use Money\Money;

/**
 * Class TipTest
 * @package Chabior\ProfitCalculator\Test
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class TipTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CalculatorFactory
     */
    protected $calculatorFactory;

    public function setUp()
    {
        $this->calculatorFactory = new CalculatorFactory(new Currency('EUR'));
    }

    /**
     * @param Tip $tip
     * @param $expected
     * @dataProvider tipProvider
     */
    public function testCalculate(Tip $tip, $expected)
    {
        $this->assertEquals(
            $expected,
            $tip->calculateProfit($this->calculatorFactory)
        );
    }

    /**
     *  @expectedException Chabior\ProfitCalculator\Exception\InvalidStakeException
     */
    public function testInvalidStake()
    {
        new Tip(new Money(-1, new Currency('EUR')), 1.2, TipStatusEnum::WON);
    }

    /**
     *  @expectedException Chabior\ProfitCalculator\Exception\InvalidOddException
     */
    public function testInvalidOdd()
    {
        new Tip(new Money(2, new Currency('EUR')), -1.2, TipStatusEnum::WON);
    }

    /**
     *  @expectedException Chabior\ProfitCalculator\Exception\InvalidStakeException
     */
    public function testEmptyStake()
    {
        new Tip(new Money(0, new Currency('EUR')), 1.2, TipStatusEnum::WON);
    }

    /**
     *  @expectedException Chabior\ProfitCalculator\Exception\InvalidOddException
     */
    public function testEmptyOdd()
    {
        new Tip(new Money(5, new Currency('EUR')), 0, TipStatusEnum::WON);
    }

    /**
     *  @expectedException Chabior\ProfitCalculator\Exception\InvalidStatusException
     */
    public function testInvalidStatus()
    {
        new Tip(new Money(12, new Currency('EUR')), 1.2, 99);
    }

    /**
     * @return array
     */
    public function tipProvider()
    {
        return array(
            0 => array (
                new Tip(
                    new Money(10000, new Currency('EUR')),
                    3.2,
                    TipStatusEnum::LOST
                ),
                new Money(0, new Currency('EUR'))
            ),
            1 => array (
                new Tip(
                    new Money(50000, new Currency('EUR')),
                    2.00,
                    TipStatusEnum::WON
                ),
                new Money(50000, new Currency('EUR')),
            ),
            2 => array (
                new Tip(
                    new Money(10000, new Currency('EUR')),
                    8.30,
                    TipStatusEnum::HALF_WON
                ),
                new Money(36500, new Currency('EUR')),
            ),
            3 => array (
                new Tip(
                    new Money(20000, new Currency('EUR')),
                    5.56,
                    TipStatusEnum::HALF_LOST
                ),
                new Money(10000, new Currency('EUR'))
            ),
            4 => array (
                new Tip(
                    new Money(30000, new Currency('EUR')),
                    1.90,
                    TipStatusEnum::VOIDED
                ),
                new Money(30000, new Currency('EUR')),
            ),
            5 => array (
                new Tip(
                    new Money(50000, new Currency('EUR')),
                    4.21,
                    TipStatusEnum::WON
                ),
                new Money(160500, new Currency('EUR')),
            ),
            6 => array (
                new Tip(
                    new Money(50000, new Currency('EUR')),
                    1,
                    TipStatusEnum::WON
                ),
                new Money(0, new Currency('EUR')),
            ),
            7 => array (
                new Tip(
                    new Money(1, new Currency('EUR')),
                    2,
                    TipStatusEnum::WON
                ),
                new Money(1, new Currency('EUR')),
            ),
        );
    }
}