<?php

namespace Chabior\ProfitCalculator;
use Chabior\ProfitCalculator\Enum\TipStatusEnum;
use Chabior\ProfitCalculator\Exception\InvalidOddException;
use Chabior\ProfitCalculator\Exception\InvalidStakeException;
use Chabior\ProfitCalculator\Exception\InvalidStatusException;
use Chabior\ProfitCalculator\Factory\CalculatorFactory;
use Money\Money;

/**
 * Class Tip
 * @package Chabior\ProfitCalculator
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class Tip
{
    /**
     * @var float
     */
    protected $odd;

    /**
     * @var Money
     */
    protected $stake;

    /**
     * @var int
     */
    protected $status;

    /**
     * Tip constructor.
     * @param Money $stake
     * @param float $odd
     * @param int $status
     * @throws InvalidOddException
     * @throws InvalidStatusException
     * @throws InvalidStakeException
     */
    public function __construct(Money $stake, $odd, $status)
    {
        if ($odd <= 0) {
            throw InvalidOddException::get();
        }

        if ($stake->getAmount() <= 0) {
            throw InvalidStakeException::get();
        }

        if (!isset(TipStatusEnum::$allowed[$status])) {
            throw InvalidStatusException::get($status);
        }

        $this->odd = $odd;
        $this->stake = $stake;
        $this->status = $status;
    }

    /**
     * @param CalculatorFactory $calculatorFactory
     * @return Money
     */
    public function calculateProfit(CalculatorFactory $calculatorFactory)
    {
        $calculator = $calculatorFactory->createForStatus($this->status);

        return $calculator->calculate($this->odd, $this->stake);
    }

}