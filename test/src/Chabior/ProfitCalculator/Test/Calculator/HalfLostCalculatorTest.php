<?php

namespace Chabior\ProfitCalculator\Test\Calculator;

use Chabior\ProfitCalculator\Calculator\HalfLostCalculator;
use Money\Currency;
use Money\Money;

/**
 * Class HalfLostCalculatorTest
 * @package Chabior\ProfitCalculator\Test\Calculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class HalfLostCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HalfLostCalculator
     */
    protected $calculator;

    public function setUp()
    {
        $this->calculator = new HalfLostCalculator();
    }

    public function testCalculate()
    {
        $this->assertEquals(
            new Money(5000, new Currency('EUR')),
            $this->calculator->calculate(2, new Money(10000, new Currency('EUR')))
        );
    }
}