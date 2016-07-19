<?php

namespace Chabior\ProfitCalculator\Test\Calculator;

use Chabior\ProfitCalculator\Calculator\VoidCalculator;
use Money\Currency;
use Money\Money;
use phpunit\framework\TestCase;

/**
 * Class VoidCalculatorTest
 * @package Chabior\ProfitCalculator\Test\Calculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class VoidCalculatorTest extends TestCase
{
    /**
     * @var VoidCalculator
     */
    protected $calculator;

    /**
     *
     */
    public function setUp()
    {
        $this->calculator = new VoidCalculator();
    }

    public function testCalculate()
    {
        $stake = new Money(12, new Currency('EUR'));
        $this->assertEquals($stake, $this->calculator->calculate(12, $stake));
    }
}