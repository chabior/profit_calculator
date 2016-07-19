<?php

namespace Chabior\ProfitCalculator\Calculator;

use Chabior\ProfitCalculator\Model\Calculable;
use Money\Money;

/**
 * Class WinCalculator
 * @package Chabior\ProfitCalculator\Calculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class WinCalculator implements Calculable
{
    /**
     * @param $odd
     * @param Money $stake
     * @return Money
     */
    public function calculate($odd, Money $stake)
    {
        return $stake->multiply($odd)->subtract($stake);
    }
}