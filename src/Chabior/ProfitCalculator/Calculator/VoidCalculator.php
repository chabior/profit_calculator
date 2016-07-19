<?php

namespace Chabior\ProfitCalculator\Calculator;


use Chabior\ProfitCalculator\Model\Calculable;
use Money\Money;

/**
 * Class VoidCalculator
 * @package Chabior\ProfitCalculator\Calculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class VoidCalculator implements Calculable
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