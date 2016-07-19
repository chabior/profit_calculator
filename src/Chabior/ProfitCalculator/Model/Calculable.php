<?php

namespace Chabior\ProfitCalculator\Model;

use Money\Money;

/**
 * Interface Calculable
 * @package Chabior\ProfitCalculator\Model
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
interface Calculable
{
    /**
     * @param $odd
     * @param Money $stake
     * @return Money
     */
    public function calculate($odd, Money $stake);
}