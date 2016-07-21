<?php

namespace Chabior\ProfitCalculator\Exception;

/**
 * Class CalculatorNotFoundException
 * @package Chabior\ProfitCalculator\Exception
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class CalculatorNotFoundException extends Exception
{
    /**
     * @param $status
     * @param array $allowedStatuses
     * @return CalculatorNotFoundException
     */
    public static function get($status, array $allowedStatuses)
    {
        return new self(
            sprintf(
                'Profit calculator for status %s not found. Allowed statuses %s.',
                $status ,
                json_encode($allowedStatuses)
            )
        );
    }
}