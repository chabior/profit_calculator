<?php

namespace Chabior\ProfitCalculator\Exception;

use Chabior\ProfitCalculator\Enum\TipStatusEnum;

/**
 * Class InvalidStatusException
 * @package Chabior\ProfitCalculator\Exception
 * @author Paweł Chabierski <p.chabierski@gmail.com>
 */
class InvalidStatusException extends Exception
{
    /**
     * @param $status
     * @return InvalidStatusException
     */
    public static function get($status)
    {
        return new self(
            sprintf(
                'Provided tip status %s is not allowed. Allowed statuses %s.',
                $status,
                json_encode(
                    array_flip(
                        TipStatusEnum::$allowed
                    )
                )
            )
        );
    }
}