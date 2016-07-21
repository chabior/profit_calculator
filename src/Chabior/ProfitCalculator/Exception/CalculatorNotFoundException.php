<?php

namespace Chabior\ProfitCalculator\Exception;

use Chabior\ProfitCalculator\Enum\TipStatusEnum;

/**
 * Class CalculatorNotFoundException
 * @package Chabior\ProfitCalculator\Exception
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class CalculatorNotFoundException extends Exception
{
    /**
     * @param $status
     * @return CalculatorNotFoundException
     */
    public static function get($status)
    {
        return new self(
            sprintf(
                'Profit calculator for status %s not found. Allowed statuses %s.',
                $status ,
                json_encode(
                    array_flip(
                        TipStatusEnum::$allowed
                    )
                )
            )
        );
    }
}