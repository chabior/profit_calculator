<?php

namespace Chabior\ProfitCalculator\Factory;

use Chabior\ProfitCalculator\Calculator\HalfLostCalculator;
use Chabior\ProfitCalculator\Calculator\HalfWinCalculator;
use Chabior\ProfitCalculator\Calculator\LostCalculator;
use Chabior\ProfitCalculator\Calculator\VoidCalculator;
use Chabior\ProfitCalculator\Calculator\WinCalculator;
use Chabior\ProfitCalculator\Enum\TipStatusEnum;
use Chabior\ProfitCalculator\Model\Calculable;
use Money\Currency;

/**
 * Class CalculatorFactory
 * @package Chabior\ProfitCalculator\Factory
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class CalculatorFactory
{
    /**
     * @var Currency
     */
    protected $currency;

    /**
     * CalculatorFactory constructor.
     * @param Currency $currency
     */
    public function __construct(Currency $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @param $status
     * @return Calculable
     */
    public function createForStatus($status)
    {
        switch ($status) {
            case TipStatusEnum::WON:
                return new WinCalculator();
            case TipStatusEnum::LOST;
                return new LostCalculator($this->currency);
            case TipStatusEnum::HALF_LOST:
                return new HalfLostCalculator($this->currency);
            case TipStatusEnum::HALF_WON:
                return new HalfWinCalculator();
            case TipStatusEnum::VOIDED:
                return new VoidCalculator();
        }
    }
}