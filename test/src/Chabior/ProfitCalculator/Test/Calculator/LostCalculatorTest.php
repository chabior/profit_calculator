<?php

namespace Chabior\ProfitCalculator\Test\Calculator;

use Chabior\ProfitCalculator\Calculator\LostCalculator;
use Money\Currency;
use Money\Money;
use phpunit\framework\TestCase;

class LostCalculatorTest extends TestCase
{
    /**
     * @var LostCalculator
     */
    protected $calculator;

    public function setUp()
    {
        $this->calculator = new LostCalculator(new Currency('EUR'));
    }

    /**
     * @param $odd
     * @param $stake
     * @param $expected
     * @dataProvider tipProvider
     */
    public function testCalculate($odd, $stake, $expected)
    {
        $this->assertEquals($expected, $this->calculator->calculate($odd, $stake));
    }

    /**
     * @return array
     */
    public function tipProvider()
    {
        return array(
            array(1.5, new Money(12, new Currency('EUR')), new Money(0, new Currency('EUR'))),
            array(3, new Money(15, new Currency('EUR')), new Money(0, new Currency('EUR'))),
        );
    }
}
