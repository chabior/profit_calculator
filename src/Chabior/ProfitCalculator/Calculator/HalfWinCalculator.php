<?php

namespace Chabior\ProfitCalculator\Calculator;

use Money\Money;

/**
 * Class HalfWinCalculator
 * @package Chabior\ProfitCalculator\Calculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class HalfWinCalculator extends WinCalculator
{
    /**
     * @param $odd
     * @param Money $stake
     * @return Money
     */
    public function calculate($odd, Money $stake)
    {
        return parent::calculate($odd, $stake->divide(2));
    }
}