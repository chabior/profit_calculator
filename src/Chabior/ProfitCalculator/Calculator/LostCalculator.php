<?php

namespace Chabior\ProfitCalculator\Calculator;


use Chabior\ProfitCalculator\Model\Calculable;
use Money\Currency;
use Money\Money;

/**
 * Class LostCalculator
 * @package Chabior\ProfitCalculator\Calculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class LostCalculator implements Calculable
{
    /**
     * @var Money/Currency
     */
    protected $currency;

    /**
     * LostCalculator constructor.
     * @param Currency $currency
     */
    public function __construct(Currency $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @param $odd
     * @param Money $stake
     * @return Money
     */
    public function calculate($odd, Money $stake)
    {
        return new Money(0, $this->currency);
    }
}