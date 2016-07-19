<?php

namespace Chabior\ProfitCalculator\Test\Calculator;
use Chabior\ProfitCalculator\Calculator\HalfWinCalculator;
use Money\Currency;
use Money\Money;
use phpunit\framework\TestCase;

/**
 * Class HalfWinCalculatorTest
 * @package Chabior\ProfitCalculator\Test\Calculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class HalfWinCalculatorTest extends TestCase
{
    /**
     * @var HalfWinCalculator
     */
    protected $calculator;

    public function setUp()
    {
        $this->calculator = new HalfWinCalculator();
    }

    public function testCalculate()
    {
        $this->assertEquals(
            new Money(4500, new Currency('EUR')),
            $this->calculator->calculate(1.9, new Money(10000, new Currency('EUR')))
        );
    }
}