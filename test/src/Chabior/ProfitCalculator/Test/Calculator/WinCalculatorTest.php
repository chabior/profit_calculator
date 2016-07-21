<?php

namespace Chabior\ProfitCalculator\Test\Calculator;

use Chabior\ProfitCalculator\Calculator\WinCalculator;
use Money\Currency;
use Money\Money;
use phpunit\framework\TestCase;

/**
 * Class WinCalculator
 * @package Chabior\ProfitCalculator\Test\Calculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class WinCalculatorTest extends TestCase
{
    /**
     * @var WinCalculator
     */
    protected $calculator;

    public function setUp()
    {
        $this->calculator = new WinCalculator();
    }

    public function testCalculate()
    {
        $this->assertEquals(
            new Money(5000, new Currency('EUR')),
            $this->calculator->calculate(1.5, new Money(10000, new Currency('EUR')))
        );
    }
}