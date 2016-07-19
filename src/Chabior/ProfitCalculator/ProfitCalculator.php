<?php

namespace Chabior\ProfitCalculator;

use Chabior\ProfitCalculator\Factory\CalculatorFactory;
use Money\Money;

/**
 * Class ProfitCalculator
 * @package Chabior\ProfitCalculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class ProfitCalculator
{
    /**
     * @var CalculatorFactory
     */
    protected $calculatorFactory;

    /**
     * ProfitCalculator constructor.
     * @param CalculatorFactory $calculatorFactory
     */
    public function __construct(CalculatorFactory $calculatorFactory)
    {
        $this->calculatorFactory = $calculatorFactory;
    }

    /**
     * @param int $status
     * @param int $odd
     * @param Money $stake
     * @return mixed
     */
    public function calculate($status, $odd, Money $stake)
    {
        $calculator = $this->calculatorFactory->createForStatus($status);

        return $calculator->calculate($odd, $stake);
    }
}