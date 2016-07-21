<?php

namespace Chabior\ProfitCalculator\Calculator;

use Chabior\ProfitCalculator\Model\Calculator;
use Money\Money;

/**
 * Class VoidCalculator
 * @package Chabior\ProfitCalculator\Calculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class VoidCalculator implements Calculator
{

    /**
     * @param $odd
     * @param Money $stake
     * @return Money
     */
    public function calculate($odd, Money $stake)
    {
        return $stake;
    }
}