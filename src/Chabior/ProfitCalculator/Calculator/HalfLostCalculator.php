<?php

namespace Chabior\ProfitCalculator\Calculator;

use Money\Money;

/**
 * Class HalfLostCalculator
 * @package Chabior\ProfitCalculator\Calculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class HalfLostCalculator
{
    /**
     * @param $odd
     * @param Money $stake
     * @return Money
     */
    public function calculate($odd, Money $stake)
    {
        return $stake->divide(2);
    }
}